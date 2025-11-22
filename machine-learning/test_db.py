from services.knowledge import get_motif_data
import sys

def test_connection():
    print("Testing MySQL Connection...")
    
    # Test case: Coba cari salah satu motif yang harusnya ada
    # User bisa ganti ini sesuai data di DB mereka
    test_id = "batik_gedong_gincu" 
    
    if len(sys.argv) > 1:
        test_id = sys.argv[1]

    print(f"Mencari data untuk ID: {test_id}")
    result = get_motif_data(test_id)
    
    if result.get("found"):
        print("✅ Data Ditemukan!")
        print(f"Title: {test_id}")
        print(f"Category: {result.get('category')}")
        print(f"Source: {result.get('source')}")
        print(f"Sacred: {result.get('is_sacred')}")
        print(f"Content Preview: {result.get('text')[:50]}...")
    else:
        print("❌ Data Tidak Ditemukan atau Error.")
        print(f"Detail: {result}")

if __name__ == "__main__":
    test_connection()
