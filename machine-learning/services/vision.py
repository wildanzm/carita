from PIL import Image
from transformers import CLIPProcessor, CLIPModel
import torch

print("⏳ Loading Vision Model... (Tunggu sebentar)")
model = CLIPModel.from_pretrained("openai/clip-vit-base-patch32")
processor = CLIPProcessor.from_pretrained("openai/clip-vit-base-patch32")

# --- KAMUS VISUAL "SAFE MODE" ---
LABEL_MAPPING = {
    # --- 1. BOBOKO (BARU) ---
    # Ciri: Bentuk Keranjang/Mangkuk (Basket/Bowl), Wadah Nasi, Ada Bibir Lingkaran
    "woven bamboo rice warmer, kitchen utensil bowl, conical container with square base stand, traditional sundanese rice basket, boboko sanggu": "anyaman_boboko",
    
    # --- 2. NYIRU (Ciri: DATAR / 2D / PIRINGAN) ---
    # Fokus: "Flat tray" (Nampan datar), "Winnowing" (Menampi), "Circular disk" (Piringan).
    "flat round woven bamboo tray, shallow winnowing basket, circular disk shape, wall decoration tray, nyiru tampah": "anyaman_nyiru",

    # --- 3. ASEUPAN (BARU: Ciri KERUCUT/LANCIP) ---
    # Fokus: "Cone shape" (Kerucut), "Triangle" (Segitiga), "Steamer" (Kukusan).
    "woven bamboo cone, sharp pointy top, triangular pyramid shape, tight solid weave (no holes), traditional rice steamer, aseupan": "anyaman_aseupan",
    # 4. GEDONG GINCU (Varian Mangga - Oranye)
    "batik pattern with orange mango fruit, kidney shape, white dotted background (cecek), isolated fruit objects, gedong gincu": "batik_gedong_gincu",

    # 5. GEDONG GINCU (Varian Buah Bulat - Merah)
    # Ciri: Ornamen bulat terpisah & rapi
    "batik pattern with repeating circular red ornaments, geometric fan-shaped wings, distinct isolated symbols on dark background, neat arrangement, gedong gincu": "batik_gedong_gincu",
    
    # 6. SIMBAR KENCANA (Varian Merah/Ungu/Pink)
    # HAPUS kata-kata rumit. FOKUS: "Purple/Maroon", "Dense Vines" (Sulur Padat).
    "batik pattern with dense interlocking vines, purple and maroon foliage, intricate leaf motif, classic royal batik style, full coverage pattern, simbar kencana": "motif_simbar_kencana",
    
    # 7. KOTA ANGIN
    "batik pattern with blue cyan background, dynamic feather-like wind motifs, curved wing shapes, air flow symbols, kota angin": "batik_kota_angin",
    
    # --- PERANGKAP 1: BATIK UMUM / SOGAN (Untuk menangkap test2.jpg) ---
    # Ini akan menangkap batik cokelat/krem klasik (seperti Solo/Jogja)
    "traditional brown sogan batik, classic javanese batik, parang or kawung motif, brown and beige colors, standard indonesian textile": "unknown_motif",

    # --- PERANGKAP 2: NON-BATIK / MODERN ---
    # Ini untuk menangkap gambar kartun, jeans, atau kain modern
    "modern pop art print, cartoon character fabric, denim jeans texture, plaid shirt pattern, polka dot textile, sketch drawing": "unknown_motif",

    # ANYAMAN UMUM (SKIP / DIABAIKAN) 
    "woven bamboo handbag with high arch handle, women's shopping basket, souvenir purse, open weave carrier, fashion accessory": "unknown_motif"
}

CANDIDATE_LABELS = list(LABEL_MAPPING.keys())

def predict_image(image_path):
    try:
        image = Image.open(image_path)
        
        # Center Crop
        width, height = image.size
        new_len = min(width, height)
        left = (width - new_len)/2
        top = (height - new_len)/2
        right = (width + new_len)/2
        bottom = (height + new_len)/2
        image = image.crop((left, top, right, bottom))

        inputs = processor(text=CANDIDATE_LABELS, images=image, return_tensors="pt", padding=True)
        outputs = model(**inputs)
        
        probs = outputs.logits_per_image.softmax(dim=1)
        top_idx = probs.argmax().item()
        
        confidence = probs[0][top_idx].item()
        desc_key = CANDIDATE_LABELS[top_idx]
        predicted_id = LABEL_MAPPING[desc_key]

        print(f"\n🔍 DEMO VISION:")
        print(f"   - Prediksi Awal: {predicted_id}")
        print(f"   - Visual Key: {desc_key[:40]}...") 
        print(f"   - Yakin: {confidence:.2%}")

        if predicted_id == "unknown_motif":
            print("⛔ TERDETEKSI SEBAGAI MOTIF UMUM / ASING.")
            return None

        # Threshold kita kembalikan ke 20%
        if confidence < 0.20: 
            print(f"⚠️ Keyakinan terlalu rendah (< 20%).")
            return None

        return {
            "motif_id": predicted_id,
            "confidence": confidence,
            "description": desc_key
        }
    except Exception as e:
        print(f"Error Vision: {e}")
        return None