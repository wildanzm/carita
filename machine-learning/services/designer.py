from rembg import remove
from PIL import Image, ImageDraw, ImageFont
import os

def create_smart_poster(image_path, title_text, category, output_filename):
    print(f"🎨 Memulai desain poster untuk kategori: {category}")

    # --- 1. SIAPKAN GAMBAR PRODUK ---
    try:
        input_img = Image.open(image_path)
        # Hapus Background
        clean_img = remove(input_img)
        
        # LOGIKA BARU: CROP KETAT (Potong Pas Bodi)
        # getbbox() mencari kotak terkecil yang berisi gambar (bukan transparan)
        bbox = clean_img.getbbox()
        if bbox:
            clean_img = clean_img.crop(bbox)
            print(f"✂️ Auto-crop berhasil. Ukuran baru: {clean_img.size}")
        else:
            print("⚠️ Gambar kosong/transparan semua.")
            
    except Exception as e:
        print(f"❌ Error proses gambar: {e}")
        return None

    # --- 2. SIAPKAN TEMPLATE ---
    base_dir = os.getcwd()
    assets_dir = os.path.join(base_dir, "assets", "templates")
    
    # Logika pilih warna & template
    cat = category.lower()
    bg_filename = "template_modern.jpg"
    text_color = "black"

    if "batik" in cat:
        bg_filename = "template_heritage.jpg"
        text_color = "#4a3b2a" # Cokelat
    elif "anyaman" in cat or "bambu" in cat:
        bg_filename = "template_natural.jpg"
        text_color = "#2f4f2f" # Hijau Tua

    bg_path = os.path.join(assets_dir, bg_filename)

    try:
        template = Image.open(bg_path).convert("RGBA")
    except:
        print(f"⚠️ Template {bg_filename} tidak ketemu, pakai putih polos.")
        template = Image.new("RGBA", (1080, 1350), "white")

    # --- 3. RESIZE & POSISIKAN DI TENGAH (CENTERING) ---
    
    # Aturan: Produk maksimal lebarnya 800px ATAU tingginya 600px
    # (Kita batasi tinggi biar gak nabrak teks di bawah)
    clean_img.thumbnail((800, 600)) 
    
    bg_w, bg_h = template.size   # Ukuran Poster (1080x1080)
    img_w, img_h = clean_img.size # Ukuran Produk yg udah dicrop & resize
    
    # Rumus Matematika Tengah: (LebarKanvas - LebarGambar) / 2
    pos_x = (bg_w - img_w) // 2
    
    # Untuk posisi Y (Atas-Bawah), kita taruh sedikit di atas tengah (offset -50)
    # Supaya ada ruang buat judul di bagian bawah
    pos_y = ((bg_h - img_h) // 2) - 50
    
    print(f"📍 Menempel gambar di koordinat: ({pos_x}, {pos_y})")
    
    # Tempel!
    template.paste(clean_img, (pos_x, pos_y), clean_img)

    # --- 4. TULIS JUDUL ---
    draw = ImageDraw.Draw(template)
    try:
        font_path = os.path.join(base_dir, "assets", "fonts", "Montserrat-Bold.ttf")
        font = ImageFont.truetype(font_path, 70) # Ukuran font judul
    except:
        font = ImageFont.load_default()

    # Tengahkan Teks Secara Horizontal
    # Menggunakan textbbox karena textlength kadang beda versi PIL
    text_bbox = draw.textbbox((0, 0), title_text, font=font)
    text_width = text_bbox[2] - text_bbox[0]
    
    text_x = (bg_w - text_width) // 2
    text_y = pos_y + img_h + 60 # Teks muncul 60px di bawah gambar
    
    # Tulis teks
    draw.text((text_x, text_y), title_text, fill=text_color, font=font)

    # --- 5. SIMPAN ---
    output_dir = os.path.join(base_dir, "static_posters")
    os.makedirs(output_dir, exist_ok=True)
    save_path = os.path.join(output_dir, output_filename)
    
    template.convert("RGB").save(save_path)
    print(f"✅ Poster jadi: {save_path}")
    return save_path