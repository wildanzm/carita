import requests
import os
import json

# Konfigurasi URL (Server Flask berjalan di port 5000)
BASE_URL = "http://localhost:5000"

# Tentukan gambar tes (Sesuaikan dengan nama file di folder imgtest kamu)
TEST_IMAGE_PATH = os.path.join("imgtest", "test_anyaman.jpg") 

def print_separator(title):
    print("\n" + "="*50)
    print(f"🧪 {title}")
    print("="*50)

def test_1_analyze():
    print_separator("TES 1: ANALISA GAMBAR (Vision + Knowledge)")
    
    if not os.path.exists(TEST_IMAGE_PATH):
        print(f"❌ Error: Gambar tes tidak ditemukan di {TEST_IMAGE_PATH}")
        return None

    url = f"{BASE_URL}/analyze"
    try:
        with open(TEST_IMAGE_PATH, 'rb') as img:
            print(f"📤 Mengirim gambar: {TEST_IMAGE_PATH}...")
            files = {'image': img}
            response = requests.post(url, files=files)
        
        if response.status_code == 200:
            data = response.json()
            print("✅ SUKSES! Hasil Analisa:")
            print(json.dumps(data, indent=2)) # Print rapi
            return data['data'] # Kembalikan data untuk tes selanjutnya
        else:
            print(f"❌ GAGAL ({response.status_code}):", response.text)
            return None
    except Exception as e:
        print(f"❌ Error Koneksi: {e}")
        return None

def test_2_storyteller(motif_data):
    print_separator("TES 2: GENERATE CERITA (LLM)")
    
    if not motif_data:
        print("⚠️ Skip tes ini karena Tes 1 gagal (tidak ada data motif).")
        return

    url = f"{BASE_URL}/compose-story"
    
    # Simulasi data yang dikirim Backend Laravel
    payload = {
        "motif_name": motif_data['motif_name'],
        "context_data": motif_data['philosophical_context'],
        "source": motif_data['source'],
        "language": "Sunda" # Kita coba request Bahasa Sunda
    }

    print(f"📤 Mengirim prompt untuk motif: {payload['motif_name']}...")

    try:
        response = requests.post(url, json=payload)
        
        if response.status_code == 200:
            res_json = response.json()
            print("✅ SUKSES! Cerita Terbuat:")
            print("-" * 20)
            print(res_json['story'])
            print("-" * 20)
        else:
            print(f"❌ GAGAL ({response.status_code}):", response.text)
    except Exception as e:
        print(f"❌ Error Koneksi: {e}")

def test_3_poster(motif_data):
    print_separator("TES 3: GENERATE POSTER")
    
    if not os.path.exists(TEST_IMAGE_PATH): return

    url = f"{BASE_URL}/generate-poster"
    
    # Gunakan nama motif dari hasil tes 1, atau default
    title = motif_data['motif_name'] if motif_data else "Batik Majalengka"
    category = motif_data['category'] if motif_data else "Batik"

    print(f"🎨 Membuat poster untuk '{title}'...")

    try:
        with open(TEST_IMAGE_PATH, 'rb') as img:
            files = {'image': img}
            data = {'title': title, 'category': category}
            response = requests.post(url, files=files, data=data)

        if response.status_code == 200:
            res_json = response.json()
            print("✅ SUKSES! Poster jadi di:")
            print(res_json['poster_url'])
            print("(Cek folder 'static_posters' di laptopmu untuk melihat hasilnya)")
        else:
            print(f"❌ GAGAL ({response.status_code}):", response.text)

    except Exception as e:
        print(f"❌ Error Koneksi: {e}")

if __name__ == "__main__":
    # Cek server nyala atau belum
    try:
        requests.get(BASE_URL)
        print("🚀 Server terdeteksi online!")
        
        # JALANKAN RANGKAIAN TES
        hasil_analisa = test_1_analyze()
        test_2_storyteller(hasil_analisa)
        test_3_poster(hasil_analisa)
        
    except requests.exceptions.ConnectionError:
        print("\n⛔ ERROR FATAL: Server Flask belum jalan!")
        print("👉 Buka terminal BARU, lalu jalankan: python app.py")
        print("👉 Setelah server nyala, baru jalankan script tes ini lagi.")