from PIL import Image
from transformers import CLIPProcessor, CLIPModel
import torch

print("⏳ Loading Vision Model... (Tunggu sebentar)")
# Kita pakai model CLIP dari OpenAI (Gratis lewat HuggingFace)
model = CLIPModel.from_pretrained("openai/clip-vit-base-patch32")
processor = CLIPProcessor.from_pretrained("openai/clip-vit-base-patch32")

# KAMUS VISUAL: Kunci=Deskripsi Inggris, Nilai=ID Database
LABEL_MAPPING = {
    "a photo of batik pattern with mango fruit motif orange color": "batik_gedong_gincu",
    "a photo of woven bamboo craft texture": "anyaman_salagedang",
    "a photo of batik pattern royal symbol classic": "motif_simbar_kencana"
}
CANDIDATE_LABELS = list(LABEL_MAPPING.keys())

def predict_image(image_path):
    try:
        image = Image.open(image_path)
        # AI membandingkan Gambar vs Teks
        inputs = processor(text=CANDIDATE_LABELS, images=image, return_tensors="pt", padding=True)
        outputs = model(**inputs)
        
        # Hitung mana yang paling mirip
        probs = outputs.logits_per_image.softmax(dim=1)
        top_idx = probs.argmax().item() # Ambil ranking 1
        
        desc_key = CANDIDATE_LABELS[top_idx]
        confidence = probs[0][top_idx].item()

        return {
            "motif_id": LABEL_MAPPING[desc_key], # Ini yang dikirim ke Laravel
            "confidence": confidence,
            "description": desc_key
        }
    except Exception as e:
        print(f"Error Vision: {e}")
        return None