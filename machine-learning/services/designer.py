from rembg import remove
from PIL import Image, ImageDraw, ImageFont, ImageFilter, ImageOps
import os
import random

def add_rounded_corners(im, rad):
    circle = Image.new('L', (rad * 2, rad * 2), 0)
    draw = ImageDraw.Draw(circle)
    draw.ellipse((0, 0, rad * 2, rad * 2), fill=255)
    alpha = Image.new('L', im.size, 255)
    w, h = im.size
    alpha.paste(circle.crop((0, 0, rad, rad)), (0, 0))
    alpha.paste(circle.crop((0, rad, rad, rad * 2)), (0, h - rad))
    alpha.paste(circle.crop((rad, 0, rad * 2, rad)), (w - rad, 0))
    alpha.paste(circle.crop((rad, rad, rad * 2, rad * 2)), (w - rad, h - rad))
    im.putalpha(alpha)
    return im

def add_drop_shadow(image, offset=(15, 15), shadow_color=(0, 0, 0, 60), blur_radius=25):
    margin = 100
    canvas_w = image.width + margin + abs(offset[0])
    canvas_h = image.height + margin + abs(offset[1])
    shadow = Image.new('RGBA', (canvas_w, canvas_h), (0, 0, 0, 0))
    if image.mode != 'RGBA':
        image = image.convert('RGBA')
    mask = image.getchannel('A')
    shadow_layer = Image.new('RGBA', image.size, shadow_color)
    shadow.paste(shadow_layer, (margin//2 + offset[0], margin//2 + offset[1]), mask=mask)
    shadow = shadow.filter(ImageFilter.GaussianBlur(blur_radius))
    shadow.paste(image, (margin//2, margin//2), image)
    return shadow

def create_smart_poster(image_path, title_text, category, output_filename):
    print(f"🎨 Memulai desain poster PRO untuk: {title_text} ({category})")

    try:
        input_img = Image.open(image_path).convert("RGBA")
        original_w, original_h = input_img.size
        
        # --- 1. SMART DETECTION ---
        try:
            clean_img = remove(input_img)
            bbox = clean_img.getbbox()
            if not bbox:
                mode = "box"
            else:
                obj_w = bbox[2] - bbox[0]
                obj_h = bbox[3] - bbox[1]
                fill_ratio = (obj_w * obj_h) / (original_w * original_h)
                cat_lower = category.lower()
                is_batik = "batik" in cat_lower or "kain" in cat_lower or "tenun" in cat_lower

                if is_batik and fill_ratio > 0.85:
                    mode = "box"
                else:
                    processed_img = clean_img.crop(bbox)
                    mode = "cutout"
        except:
            mode = "box"

        if mode == "box":
            new_len = min(original_w, original_h)
            left = (original_w - new_len)/2
            top = (original_h - new_len)/2
            right = (original_w + new_len)/2
            bottom = (original_h + new_len)/2
            processed_img = input_img.crop((left, top, right, bottom))

        # Resize
        basewidth = 600 
        w_percent = (basewidth / float(processed_img.size[0]))
        h_size = int((float(processed_img.size[1]) * float(w_percent)))
        processed_img = processed_img.resize((basewidth, h_size), Image.Resampling.LANCZOS)

        # --- VISUAL UPGRADE (DOUBLE FRAMING) ---
        if mode == "box":
            # 1. Inner Gold Border (Garis Emas Tipis di sekeliling kain)
            # Warna: #8d6e63 (Cokelat Tembaga)
            inner_border = 8
            processed_img = ImageOps.expand(processed_img, border=inner_border, fill="#5d4037")
            
            # 2. Outer White Frame (Bingkai Putih Tebal)
            outer_border = 35
            processed_img = ImageOps.expand(processed_img, border=outer_border, fill="white")
            
            # 3. Baru di-Rounded (Sudut Melengkung Luar)
            processed_img = add_rounded_corners(processed_img, rad=30)
            
            # 4. Rotasi
            angle = random.uniform(-2, 2)
            processed_img = processed_img.rotate(angle, expand=True, resample=Image.BICUBIC)

        # Shadow Akhir
        final_product = add_drop_shadow(processed_img)

    except Exception as e:
        print(f"❌ Error proses gambar: {e}")
        return None

    # --- 2. TEMPLATE & STYLE ---
    base_dir = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
    assets_dir = os.path.join(base_dir, "assets", "templates")
    
    cat_lower = category.lower()
    bg_filename = "template_modern.jpg"
    
    # Default Colors
    text_color_title = "#1a1a1a"
    text_color_sub = "#1a1a1a"
    tagline = "Karya Otentik Majalengka"
    
    # Style Settings
    stroke_width = 0
    stroke_color = "white"

    if "batik" in cat_lower or "tenun" in cat_lower:
        bg_filename = "template_heritage.jpg" 
        # Warna Judul: Hitam Pekat (Biar tegas)
        text_color_title = "#212121" 
        # Warna Kategori: Cokelat Tembaga (Biar mewah)
        text_color_sub = "#5d4037" 
        tagline = "Warisan Leluhur Bernilai Tinggi"
        stroke_width = 0 
        
    elif "anyaman" in cat_lower or "bambu" in cat_lower or "kriya" in cat_lower:
        bg_filename = "template_natural.jpg"
        # Warna Anyaman (Hijau Tua + Stroke Putih)
        text_color_title = "#004d40"
        text_color_sub = "#004d40"
        tagline = "Kehangatan Alam & Kearifan Lokal"
        stroke_width = 4 

    bg_path = os.path.join(assets_dir, bg_filename)

    try:
        template = Image.open(bg_path).convert("RGBA")
        template = template.resize((1080, 1350)) 
    except:
        template = Image.new("RGBA", (1080, 1350), "white")

    # --- 3. KOMPOSISI ---
    bg_w, bg_h = template.size
    img_w, img_h = final_product.size
    
    pos_x = (bg_w - img_w) // 2
    pos_y = (bg_h - img_h) // 2 - 180 
    
    template.paste(final_product, (pos_x, pos_y), final_product)

    # --- 4. TYPOGRAPHY ---
    draw = ImageDraw.Draw(template)
    fonts_dir = os.path.join(base_dir, "assets", "fonts")
    
    try:
        title_font = ImageFont.truetype(os.path.join(fonts_dir, "Montserrat-Bold.ttf"), 65)
        cat_font = ImageFont.truetype(os.path.join(fonts_dir, "Montserrat-Bold.ttf"), 30)
        tagline_font = ImageFont.truetype(os.path.join(fonts_dir, "Montserrat-Bold.ttf"), 35)
    except:
        title_font = ImageFont.load_default()
        cat_font = ImageFont.load_default()
        tagline_font = ImageFont.load_default()

    text_cursor_y = pos_y + img_h + 30

    # A. Kategori
    category_text = f"— KARYA {category.upper()} MAJALENGKA —"
    cat_bbox = draw.textbbox((0, 0), category_text, font=cat_font)
    cat_w = cat_bbox[2] - cat_bbox[0]
    draw.text(((bg_w - cat_w) // 2, text_cursor_y), category_text, fill=text_color_sub, font=cat_font, stroke_width=stroke_width, stroke_fill=stroke_color)

    # B. Judul Utama
    if len(title_text) > 22: title_text = title_text[:20] + "..."
    title_bbox = draw.textbbox((0, 0), title_text, font=title_font)
    title_w = title_bbox[2] - title_bbox[0]
    text_cursor_y += 50
    draw.text(((bg_w - title_w) // 2, text_cursor_y), title_text, fill=text_color_title, font=title_font, stroke_width=stroke_width, stroke_fill=stroke_color)

    # C. Tagline
    text_cursor_y += 80
    tag_bbox = draw.textbbox((0, 0), tagline, font=tagline_font)
    tag_w = tag_bbox[2] - tag_bbox[0]
    draw.text(((bg_w - tag_w) // 2, text_cursor_y), tagline, fill=text_color_sub, font=tagline_font, stroke_width=stroke_width, stroke_fill=stroke_color)

    # --- 5. SIMPAN ---
    output_dir = os.path.join(base_dir, "static_posters")
    os.makedirs(output_dir, exist_ok=True)
    save_path = os.path.join(output_dir, output_filename)
    
    template.convert("RGB").save(save_path, quality=95)
    print(f"✅ Poster Pro jadi: {save_path}")
    return save_path