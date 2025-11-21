import json
import chromadb
import os
from sentence_transformers import SentenceTransformer

# Konfigurasi Path Database
DB_PATH = os.path.join(os.getcwd(), "data", "chroma_db")
DATA_PATH = os.path.join(os.getcwd(), "data", "knowledge_base.json")

# Inisialisasi Client DB & Model Embedding
chroma_client = chromadb.PersistentClient(path=DB_PATH)
embedding_model = SentenceTransformer('paraphrase-multilingual-MiniLM-L12-v2') # Support Bahasa Indonesia

def get_collection():
    return chroma_client.get_or_create_collection(name="cultural_brain")

def ingest_data():
    """Fungsi untuk memasukkan data JSON ke Database Vector"""
    print("⏳ Memulai proses ingesti data ke Otak...")
    
    collection = get_collection()
    
    # Hapus data lama biar bersih (reset)
    if collection.count() > 0:
        chroma_client.delete_collection("cultural_brain")
        collection = chroma_client.create_collection("cultural_brain")

    with open(DATA_PATH, 'r') as f:
        data = json.load(f)

    ids = [item['id'] for item in data]
    documents = [item['text'] for item in data]
    metadatas = [item['metadata'] for item in data]
    
    # Generate Embeddings
    embeddings = embedding_model.encode(documents).tolist()

    # Simpan ke DB
    collection.add(
        ids=ids,
        embeddings=embeddings,
        documents=documents,
        metadatas=metadatas
    )
    print(f"✅ Sukses! {len(ids)} data budaya tersimpan di Otak.")

def search_brain(motif_id):
    """Mencari data berdasarkan ID motif"""
    collection = get_collection()
    # Kita cari berdasarkan ID spesifik (karena Vision AI sudah tahu ID-nya)
    result = collection.get(ids=[motif_id])
    return result

# Bagian ini jalan kalau kita ketik: python services/brain.py
if __name__ == "__main__":
    ingest_data()