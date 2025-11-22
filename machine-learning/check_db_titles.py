from services.db import get_db_connection

def list_titles():
    print("--- MEMERIKSA DATA DATABASE ---")
    conn = get_db_connection()
    if not conn:
        print("❌ Gagal koneksi ke database.")
        return

    try:
        cursor = conn.cursor()
        cursor.execute("SELECT id, title FROM cultural_chunks LIMIT 20")
        rows = cursor.fetchall()
        
        print(f"Ditemukan {len(rows)} baris data (Limit 20):")
        print(f"{'ID':<5} | {'TITLE'}")
        print("-" * 30)
        for row in rows:
            # Handle jika row adalah tuple atau dict tergantung konfigurasi cursor
            # Default cursor biasanya tuple
            r_id = row[0]
            r_title = row[1]
            print(f"{r_id:<5} | {r_title}")
            
        cursor.close()
        conn.close()
    except Exception as e:
        print(f"❌ Error saat query: {e}")

if __name__ == "__main__":
    list_titles()
