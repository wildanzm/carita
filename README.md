# 🇮🇩 CARITA - Cultural AI for Retail & Identity-Telling Assistant

**CARITA** adalah platform berbasis AI yang memberdayakan perajin lokal (khususnya Majalengka) untuk meningkatkan nilai jual produk melalui *storytelling* budaya yang otentik. Sistem ini memadukan **Vision AI** untuk mengenali motif dan **Generative AI** untuk membuat narasi pemasaran serta poster digital secara otomatis.

---

## 🌟 Fitur Utama

### 🧠 AI & Core Features
* **📸 Vision Recognition (CLIP):** AI mampu mengenali motif batik atau anyaman dari foto yang diunggah (Zero-Shot Learning), bahkan jika foto tersebut diambil dari sudut yang sulit.
* **📝 RAG Storytelling (Groq):** Menghasilkan narasi yang tidak berhalusinasi karena berbasis data riset ("Cultural Brain") yang tersimpan dalam Vector Database.
* **🎨 Smart Poster Generator:** Fitur baru! Otomatis menghapus *background* foto produk (menggunakan `rembg`) dan mendesain poster pemasaran profesional dengan *template* yang sesuai kategori (Heritage/Modern).
* **🛡️ Cultural Guardrail:** Sistem keamanan etika yang mencegah penyalahgunaan motif berlabel **[Sakral]** untuk tujuan komersial.

### 💻 Aplikasi Web
* **Admin Panel (Filament PHP):** Dashboard manajemen data budaya yang modern dan *user-friendly* untuk Kurator/Admin.
* **User Dashboard (Livewire Flux):** Antarmuka responsif bagi perajin untuk mengelola produk, melihat riwayat cerita, dan mengunduh aset digital (QR & Poster).
* **Public Story Page:** Halaman publik `/s/{uuid}` yang SEO-friendly untuk setiap produk.
* **Marketplace Ready:** Struktur database kini mendukung manajemen produk (Harga, Deskripsi, Stok) yang terhubung dengan cerita budaya.

---

## 🏗️ Arsitektur Sistem

Sistem menggunakan arsitektur **Hybrid Monolith**, di mana aplikasi utama berbasis PHP berkomunikasi dengan *Microservice* AI berbasis Python.

```
graph TD
    subgraph "User Experience"
        User[👤 Perajin] -->|Upload Foto| Frontend[🟢 Laravel Livewire]
        Frontend -->|Manage Data| Filament[🟠 Filament Admin]
    end
    
    subgraph "Data & Storage"
        MySQL[(🗄️ MySQL: Data Relasional)]
        ChromaDB[(📚 ChromaDB: Vector Search)]
        Storage[📂 Storage: Foto & Poster]
    end
    
    subgraph "AI Microservice (Flask)"
        API[🐍 Python Flask API]
        Vision[👁️ CLIP Vision Model]
        RAG[🧠 RAG Engine (Groq)]
        Designer[🎨 Poster Designer (Rembg)]
    end

    Frontend <-->|REST API| API
    Frontend <--> MySQL
    
    API --> Vision
    API -->|Context Retrieval| ChromaDB
    API -->|Generate Text| RAG
    API -->|Process Image| Designer
````

-----

## 🛠️ Teknologi (Tech Stack)

### **Backend & Frontend (Laravel)**

  * **Framework:** Laravel 12
  * **Admin Panel:** FilamentPHP v3
  * **Frontend Stack:** Livewire 3 + Volt + Flux UI (Komponen Modern)
  * **Styling:** Tailwind CSS
  * **Database:** MySQL 8.0
  * **Queue:** Redis (Untuk memproses job AI di background)

### **AI Service (Python)**

  * **Framework:** Flask
  * **LLM Engine:** Groq API
  * **Vision Model:** OpenAI CLIP (via `sentence-transformers`)
  * **Vector DB:** MySQL (Menyimpan embedding pengetahuan budaya)
  * **Image Processing:** `rembg` (Hapus background), `Pillow` (Manipulasi gambar)

-----

## 🚀 Panduan Instalasi

Ikuti langkah ini untuk menjalankan CARITA di lingkungan lokal (Development).

### Prasyarat

  * PHP \>= 8.2, Composer
  * Python \>= 3.10, Pip
  * Node.js & NPM
  * MySQL & Redis

### 1\. Setup Aplikasi Utama

Masuk ke folder `application`:

```bash
cd application
composer install
npm install
cp .env.example .env
```

Konfigurasi `.env` (Sesuaikan database & Redis):

```env
DB_CONNECTION=mysql
DB_DATABASE=carita_db
QUEUE_CONNECTION=redis
FILESYSTEM_DISK=public
```

Jalankan migrasi dan seeder (Penting: Seeder akan membuat Role Admin & User):

```bash
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
```

### 2\. Setup AI Service

Masuk ke folder `machine-learning`:

```bash
cd machine-learning
python -m venv venv
# Aktifkan Venv (Windows: venv\Scripts\activate || Mac/Linux: source venv/bin/activate)
```

Install dependensi (Gunakan perintah khusus untuk PyTorch CPU agar ringan):

```bash
# Install sisa library
pip install -r requirements.txt
```

Buat file `.env` di folder `machine-learning` dan isi API Key:

```env
# Wajib diisi untuk fitur Chat/Story
GROQ_API_KEY=gsk_xxxxxxxxxxxxxxxxxxxxxxxx
# Koneksi Database
DB_HOST=localhost
DB_USER=root
DB_PASSWORD=
DB_NAME=carita_db
```

### 3\. Menjalankan Sistem

Anda perlu menjalankan **3 terminal** berbeda:

  * **Terminal 1 (Laravel Server):**

    ```bash
    cd application
    php artisan serve
    ```

  * **Terminal 2 (Queue Worker & Assets):**

    ```bash
    cd application
    php artisan queue:work
    ```

  * **Terminal 3 (Python AI Service):**

    ```bash
    cd machine-learning
    python app.py
    ```

Akses aplikasi di: `http://localhost:8000`  
Akses Admin Panel di: `http://localhost:8000/admin`

-----

## 📖 Cara Kerja Fitur Utama

1.  **Input Pengetahuan (Admin):**

      * Admin masuk ke panel Filament.
      * Menambahkan "Cultural Chunk" (misal: Filosofi Batik Angin) + Foto Referensi.
      * Python Service otomatis melakukan *embedding* teks dan gambar ke ChromaDB.

2.  **User Flow (Perajin):**

      * User login -\> Klik "Buat Cerita".
      * Upload foto produk.
      * **Proses AI:**
        1.  Vision AI membandingkan foto user dengan database motif.
        2.  Jika motif dikenali, RAG mengambil filosofinya.
        3.  LLM (Groq) menulis narasi puitis.
        4.  Designer AI membuat poster otomatis.
      * User menerima: Narasi, QR Code, dan Poster Digital siap posting.

-----

## 👥 Tim Pengembang (WindTech)

  * **AI/ML Engineer:** Abrar Wahid
  * **Backend Developer:** Ahmad Nur Ain
  * **Fullstack Developer:** Wildan Zhilal Manafi
  * **Frontend Developer:** Zacky Hafsari
  * **Riset & Budaya:** Novi Silvia

-----

*Dibuat dengan ❤️ untuk melestarikan Budaya Indonesia.*
