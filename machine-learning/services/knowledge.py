from services.db import get_db_connection

def get_motif_data(motif_id):
    """Mencari data motif berdasarkan ID (title) di database MySQL"""
    try:
        conn = get_db_connection()
        if not conn:
            return {"found": False, "error": "Database connection failed"}
        
        cursor = conn.cursor(dictionary=True)
        
        # Query ke tabel cultural_chunks
        # Mapping: id -> title
        # Kita gunakan LIKE agar pencarian lebih fleksibel (misal: "batik_gedong_gincu" bisa match "Batik Gedong Gincu")
        query = "SELECT title, content, citation, category, is_sacred FROM cultural_chunks WHERE title LIKE %s LIMIT 1"
        
        # Bersihkan ID dari prefix umum agar pencarian lebih luas
        # Contoh: "batik_gedong_gincu" -> "gedong_gincu" -> cari "%gedong%gincu%"
        # Ini membantu jika di DB namanya cuma "Gedong Gincu" tanpa kata "Batik"
        clean_id = motif_id.lower()
        for prefix in ['batik_', 'anyaman_', 'motif_']:
            if clean_id.startswith(prefix):
                clean_id = clean_id.replace(prefix, '', 1)

        # Ubah underscore DAN spasi jadi wildcard (%)
        # Ini menangani "gedong_gincu", "gedong gincu", atau "gedong  gincu"
        search_term = f"%{clean_id.replace('_', '%').replace(' ', '%')}%"
        
        print(f"DEBUG: Searching DB for '{motif_id}' -> Cleaned: '{clean_id}' -> LIKE '{search_term}'")
        
        cursor.execute(query, (search_term,))
        
        result = cursor.fetchone()
        cursor.close()
        conn.close()
        
        if result:
            print(f"DEBUG: Found data: {result['title']}")
            # Konversi is_sacred dari database (bisa jadi 0/1 atau 'True'/'False') ke boolean
            is_sacred_val = result['is_sacred']
            if isinstance(is_sacred_val, str):
                is_sacred_bool = is_sacred_val.lower() == 'true'
            else:
                is_sacred_bool = bool(is_sacred_val)

            return {
                "found": True,
                "text": result['content'],          # Mapping: content -> text
                "source": result['citation'],       # Mapping: citation -> source
                "category": result['category'],     # Mapping: category -> category
                "is_sacred": is_sacred_bool         # Mapping: is_sacred -> is_sacred
            }
        else:
            return {"found": False}
            
    except Exception as e:
        return {"found": False, "error": str(e)}