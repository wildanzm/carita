import os
from groq import Groq
from dotenv import load_dotenv

load_dotenv()
client = Groq(api_key=os.environ.get("GROQ_API_KEY"))

def generate_story(motif_name, context_data, source, language="Indonesia"):
    
    # --- 1. KONFIGURASI "RASA" BAHASA (TONE OF VOICE) ---
    
    if language.lower() == "sunda":
        target_language = "Basa Sunda (Lemes & Akrab)"
        style_instruction = """
        - WAJIB menggunakan **Basa Sunda** yang luwes (mengalir), jangan kaku seperti terjemahan robot.
        - Gunakan gaya bahasa 'ngawangkong' (bercerita hangat) seperti sedang bicara pada kerabat.
        - Gunakan partikel khas Sunda yang pas (misal: 'teh', 'mah', 'atuh', 'geura') untuk menambah rasa.
        - JANGAN gunakan kalimat perintah kasar. Gunakan ajakan halus (misal: 'Mangga dihaturanan').
        - Sentuh aspek 'kaasih' (kasih sayang) dan 'kaneamanan' (kenyamanan).
        """
    elif language.lower() == "inggris":
        target_language = "English (Sophisticated & Storytelling)"
        style_instruction = """
        - Use **English** with a sophisticated, editorial tone (like Vogue/Kinfolk magazine).
        - Avoid robotic grammar. Use sensory words (e.g., 'warmth', 'texture', 'heritage', 'soul').
        - Sell the 'Lifestyle', not just the object. Make the reader feel like a collector of art.
        """
    elif language.lower() == "santai":
        target_language = "Bahasa Indonesia Gaul (Vibes Sosmed)"
        style_instruction = """
        - Gunakan bahasa **Santai/Gaul** yang natural (ala TikTok/Twitter).
        - JANGAN kaku. Gunakan istilah seperti 'Jujurly', 'Vibesnya', 'Auto cakep', 'Racun banget'.
        - Fokus pada 'FOMO' (Takut ketinggalan tren) dan estetika visual.
        - Buat pembaca merasa produk ini wajib punya buat konten/gaya hidup.
        """ 
    else: # Default Indonesia
        target_language = "Bahasa Indonesia (Elegan & Puitis)"
        style_instruction = """
        - Gunakan **Bahasa Indonesia** yang berkelas, mengalir, dan emosional.
        - Hindari kalimat klise jual beli (seperti 'ayo beli', 'murah meriah').
        - Gunakan teknik 'Hypnotic Writing': Bawa pembaca membayangkan rasanya memiliki produk ini.
        - Fokus pada apresiasi budaya dan kualitas tak ternilai.
        """

    # --- 2. PROMPT ENGINEERING (ADVANCED COPYWRITING) ---
    prompt = f"""
    [PERAN]
    Kamu adalah Chief Storyteller untuk brand warisan budaya premium. 
    Tugasmu adalah menyulap fakta kaku menjadi narasi yang menghipnotis pembeli.

    [DATA PRODUK]
    - Nama: "{motif_name}"
    - Fakta Dasar: "{context_data}"
    - Sumber Validasi: {source}

    [ATURAN UTAMA]
    ⚠️ **BAHASA OUTPUT: {target_language}** (Mutlak!)
    ⚠️ JANGAN menerjemahkan fakta mentah-mentah. Ambil intinya, lalu kembangkan jadi cerita baru yang indah.

    [PANDUAN GAYA BAHASA]
    {style_instruction}

    [STRUKTUR CAPTION (COPYWRITING FORMULA)]
    1. **THE HOOK (Pancingan Emosi):** Buka dengan kalimat yang menyentuh perasaan, kenangan, atau imajinasi. Jangan langsung jualan.
    
    2. **THE STORY (Isi Cerita):**
       Ceritakan produk ini seolah ia punya nyawa. 
       - Jika Anyaman/Boboko: Ceritakan tentang kehangatan nasi, aroma dapur ibu, atau estetika ruangan yang tenang.
       - Jika Batik: Ceritakan tentang aura wibawa, keanggunan, atau doa yang tersemat di kainnya.
       
    3. **THE INVITATION (Closing):**
       Ajak pembeli untuk menjadi bagian dari pelestari budaya ini. Buat mereka merasa bangga jika membelinya.

    [FORMAT OUTPUT]
    - Panjang: 1 Paragraf utuh yang mengalir enak (sekitar 3-5 kalimat panjang).
    - Tutup dengan 3-4 hashtags relevan.
    - HANYA berikan teks caption, tanpa pembuka/penutup lain.
    """

    try:
        # Kita naikkan temperature ke 0.85 agar lebih "Luwes/Kreatif" dan tidak kaku
        chat = client.chat.completions.create(
            messages=[{"role": "user", "content": prompt}],
            model="llama-3.3-70b-versatile",
            temperature=0.85, 
        )
        return chat.choices[0].message.content
    except Exception as e:
        return f"Maaf, nuju ngarangkai kata... (Error: {str(e)})"