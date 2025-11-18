# 🇮🇩 CARITA - Cultural AI for Retail & Identity-Telling Assistant

**CARITA** adalah aplikasi web berbasis AI yang berfungsi sebagai "mesin penerjemah nilai budaya". Proyek ini bertujuan membantu perajin dan UMKM (khususnya di Majalengka) untuk meningkatkan nilai jual produk melalui *storytelling* digital yang otentik, puitis, dan berbasis data riset budaya lokal.

---

## 🧠 Konsep Utama: Otak & Mesin

Sistem CARITA dibangun di atas arsitektur dua lapis yang unik:

1.  **OTAK (Cultural Brain):** Basis data pengetahuan budaya hasil riset primer (bukan data internet acak). Berisi filosofi motif, sejarah, dan nilai kesakralan.
2.  **MESIN (AI Engine):** Kombinasi *Vision AI* dan *Generative AI* (RAG) yang mengolah "Otak" menjadi narasi pemasaran yang menyentuh hati.

---

## 🌟 Fitur Unggulan

* 📸 **Upload & Deteksi Motif:** Unggah foto produk (batik/anyaman), AI akan mengenali motifnya (misal: Gedong Gincu, Lauk Ngibing).
* 📝 **AI Story Generator:** Menghasilkan deskripsi produk puitis dalam < 15 detik berdasarkan fakta budaya.
* 🛡️ **Cultural Safeguard (Guardrail):** Sistem otomatis memblokir atau memberi peringatan jika motif "Sakral" digunakan untuk tujuan komersial yang tidak etis.
* 🔗 **QR Scan-to-Story:** Generate kode QR unik untuk setiap produk yang mengarah ke halaman cerita publik.
* 📱 **Mobile Friendly:** Dioptimalkan untuk HP Android spesifikasi rendah.

---

## 🏗️ Arsitektur Sistem

Berikut adalah gambaran bagaimana data mengalir dalam sistem CARITA:

```mermaid
graph TD
    User[👤 Perajin/User] -->|Upload Foto| Laravel[🟢 Laravel App (Web)]
    
    subgraph "Aplikasi Utama (Laravel)"
        Laravel -->|Simpan Data| MySQL[(🗄️ Database MySQL)]
        Laravel -->|Antrean Job| Redis[(🔴 Redis Queue)]
        MySQL <-->|Cultural Data| Laravel
    end
    
    subgraph "AI Microservice (Python)"
        Laravel -->|API Request| Flask[🐍 Python Flask Service]
        Flask -->|Vision Processing| Vision[👁️ Vision Model]
        Flask -->|Embedding| RAG[📚 RAG System]
        Vision --> Flask
        RAG --> Flask
    end

    Flask -->|Hasil Narasi| Laravel
    Laravel -->|Generate QR| QRCode[📱 QR Code]
    QRCode --> User
````

### Struktur Database (ERD Sederhana)

  * **`cultural_chunks`**: Menyimpan "Otak" (Narasi, Embedding, Label Sakral).
  * **`generated_stories`**: Menyimpan hasil generasi user (Foto, Cerita, QR, UUID).
  * **`audit_logs`**: Mencatat aktivitas keamanan dan pelanggaran etika budaya.

-----

## 🛠️ Teknologi yang Digunakan

**Frontend & Backend:**

  * **Framework:** Laravel 12
  * **UI:** Livewire 3 + Tailwind CSS
  * **Database:** MySQL
  * **Queue:** Redis
  * **Security:** Spatie Laravel Permission

**AI Service (Microservice):**

  * **Language:** Python 3.10+
  * **Framework:** Flask
  * **AI Libraries:** PyTorch, Sentence-Transformers, Pillow
  * **Architecture:** REST API (Internal Communication)

-----

## 🚀 Panduan Instalasi (Step-by-Step)

Ikuti langkah ini untuk menjalankan CARITA di komputer lokal Anda.

### Prasyarat

Pastikan Anda sudah menginstal:

  * PHP \>= 8.2 & Composer
  * Node.js & NPM
  * Python \>= 3.10
  * MySQL & Redis

### 1\. Setup Aplikasi Utama (Laravel)

Masuk ke folder aplikasi:

```bash
cd application
```

Install dependensi PHP dan JavaScript:

```bash
composer install
npm install
```

Duplikasi file `.env` dan atur konfigurasi database:

```bash
cp .env.example .env
php artisan key:generate
```

Ubah konfigurasi `.env` sesuai database lokal Anda:

```env
DB_DATABASE=carita_db
DB_USERNAME=root
DB_PASSWORD=

QUEUE_CONNECTION=redis
```

Jalankan migrasi database dan *seeder* (data dummy awal):

```bash
php artisan migrate --seed
```

*(Command ini akan membuat tabel dan mengisi data user Admin serta contoh data budaya)*

### 2\. Setup AI Service (Python)

Buka terminal baru, masuk ke folder service python (buat folder `python-service` sejajar dengan `application` jika belum ada):

```bash
cd python-service
python -m venv venv
source venv/bin/activate  # Untuk Mac/Linux
# atau
venv\Scripts\activate     # Untuk Windows
```

Install library AI:

```bash
pip install -r requirements.txt
```

Buat file `.env` di dalam folder `python-service` untuk API Key:

```env
CARITA_AI_KEY=rahasia-dapur-carita
```

### 3\. Menjalankan Aplikasi

Anda perlu menjalankan **3 terminal** secara bersamaan:

**Terminal 1 (Laravel Server):**

```bash
cd application
php artisan serve
```

**Terminal 2 (Frontend Build & Queue Worker):**

```bash
cd application
npm run dev
# Buka tab baru untuk worker
php artisan queue:work
```

**Terminal 3 (Python AI Service):**

```bash
cd python-service
# Pastikan venv aktif
python app.py
```

Akses aplikasi di browser: `http://localhost:8000`

-----

## 📖 Alur Penggunaan (User Flow)

1.  **Login:** Masuk sebagai User (Perajin) atau Admin (Kurator).
2.  **Dashboard:**
      * *Admin:* Mengelola data "Otak Budaya" (Tambah/Edit Chunk Budaya).
      * *User:* Melihat riwayat cerita yang pernah dibuat.
3.  **Buat Cerita Baru:**
      * Klik "Buat Cerita".
      * Upload foto produk (Batik/Anyaman).
      * Tunggu proses AI (Vision mendeteksi motif -\> RAG mencari filosofi -\> LLM menulis narasi).
4.  **Hasil:**
      * Aplikasi menampilkan foto + narasi puitis.
      * Unduh QR Code yang dihasilkan.
5.  **Public Page:**
      * Scan QR Code akan membuka halaman publik `carita.id/s/{uuid}` yang berisi cerita tersebut.

-----

## 🔒 Keamanan & Etika

  * **Guardrail:** Jika AI mendeteksi motif sakral, tombol "Generate Commercial Story" akan dinonaktifkan.
  * **UUID:** URL cerita publik menggunakan UUID acak agar data perajin tidak mudah di-*scraping*.
  * **Audit Log:** Setiap upaya penggunaan data sakral tercatat di database.

-----

## 👥 Tim Pengembang (WindTech)

  * **AI/ML Engineer:** Abrar Wahid
  * **Backend Developer:** Ahmad Nur Ain
  * **Fullstack Developer:** Wildan Zhilal Manafi
  * **Frontend Developer:** Zacky Hafsari
  * **Riset & Budaya:** Novi Silvia

-----

*Dibuat dengan ❤️ dan ☕ untuk Budaya Majalengka.*

```