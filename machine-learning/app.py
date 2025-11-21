from flask import Flask, request, jsonify, send_from_directory
import os, uuid
from dotenv import load_dotenv

# Import Service Kita
from services.vision import predict_image
from services.storyteller import generate_story
from services.designer import create_smart_poster
# PENTING: Kita butuh ini buat mode tes mandiri
from services.knowledge import get_motif_data 

load_dotenv()
app = Flask(__name__)

UPLOAD_FOLDER = 'temp_uploads'
POSTER_FOLDER = 'static_posters'
os.makedirs(UPLOAD_FOLDER, exist_ok=True)
os.makedirs(POSTER_FOLDER, exist_ok=True)

@app.route('/')
def home(): return "CARITA AI Service Ready! 🚀"

# --- ENDPOINT 1: ANALYZE (VISION + DATA LENGKAP) ---
@app.route('/analyze', methods=['POST'])
def analyze():
    if 'image' not in request.files: return jsonify({"error": "No image"}), 400
    file = request.files['image']
    path = os.path.join(UPLOAD_FOLDER, f"{uuid.uuid4()}_{file.filename}")
    file.save(path)

    # 1. Vision Deteksi ID
    res = predict_image(path)
    # os.remove(path) # Jangan hapus dulu biar aman

    if not res: return jsonify({"error": "Vision fail"}), 500
    
    motif_id = res['motif_id']

    # 2. Ambil Data Tambahan dari JSON (Biar Test Script Gak Error)
    brain = get_motif_data(motif_id)
    
    # 3. Cek Sakral
    if brain.get('is_sacred'):
        return jsonify({"status": "blocked", "warning": "⚠️ Motif Sakral Terdeteksi!"})

    # 4. RETURN DATA LENGKAP (Ini yang bikin error tadi kalau kurang)
    return jsonify({
        "status": "success",
        "data": {
            "motif_id": motif_id,
            # KOREKSI UTAMA: Kita buat nama cantik dari ID
            "motif_name": motif_id.replace("_", " ").title(), 
            "confidence": res['confidence'],
            # Ambil dari knowledge.py, kalau gak ada kasih default
            "philosophical_context": brain.get('text', 'Deskripsi belum ada di database.'),
            "category": brain.get('category', 'Umum'),
            "source": brain.get('source', 'Tim Riset')
        }
    })

# --- ENDPOINT 2: COMPOSE STORY ---
@app.route('/compose-story', methods=['POST'])
def compose():
    d = request.json
    
    # Cek input, bisa dari ID (Mode Mandiri) atau Data Mentah (Mode Integrasi)
    if 'motif_id' in d:
        # Mode Mandiri: Cari data sendiri
        brain = get_motif_data(d['motif_id'])
        name = d['motif_id'].replace("_", " ").title()
        ctx = brain.get('text', '')
        src = brain.get('source', '')
    else:
        # Mode Integrasi: Data dikirim Laravel
        name = d.get('motif_name')
        ctx = d.get('context_data')
        src = d.get('source')

    if not name: return jsonify({"error": "Data tidak lengkap"}), 400

    story = generate_story(name, ctx, src, d.get('language', 'Indonesia'))
    return jsonify({"status": "success", "story": story})

# --- ENDPOINT 3: POSTER ---
@app.route('/generate-poster', methods=['POST'])
def poster():
    if 'image' not in request.files: return jsonify({"error": "No image"}), 400
    file = request.files['image']
    
    in_path = os.path.join(UPLOAD_FOLDER, f"raw_{uuid.uuid4()}.jpg")
    file.save(in_path)
    
    out_name = f"poster_{uuid.uuid4()}.jpg"
    try:
        create_smart_poster(in_path, request.form.get('title'), request.form.get('category'), out_name)
        os.remove(in_path)
        
        url = f"{request.host_url}static_posters/{out_name}"
        return jsonify({"status": "success", "poster_url": url})
    except Exception as e:
        return jsonify({"error": str(e)}), 500

@app.route('/static_posters/<path:filename>')
def serve_poster(filename):
    return send_from_directory(POSTER_FOLDER, filename)

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000, debug=True)