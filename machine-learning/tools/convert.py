import json, os, datetime
from sentence_transformers import SentenceTransformer

# Load Model Vektor (Butuh download di awal)
print("⏳ Loading Model AI...")
model = SentenceTransformer('paraphrase-multilingual-MiniLM-L12-v2')

def generate_sql():
    json_path = os.path.join("data", "knowledge_base.json")
    output_sql = "seed_cultural_chunks.sql"
    
    with open(json_path, 'r') as f: data = json.load(f)
    
    print(f"⏳ Mengonversi {len(data)} data ke SQL...")
    
    with open(output_sql, 'w', encoding='utf-8') as f:
        # Header SQL sesuai tabel Laravel
        f.write("INSERT INTO cultural_chunks (title, content, category, citation, is_sacred, embedding, created_at, updated_at) VALUES\n")
        
        values = []
        now = datetime.datetime.now().strftime("%Y-%m-%d %H:%M:%S")
        
        for item in data:
            title = item['id'] # ID dipakai sebagai Title
            content = item['text'].replace("'", "\\'")
            cat = item['metadata']['category']
            cit = item['metadata']['source']
            sacred = 1 if item['metadata']['is_sacred'] == "True" else 0
            
            # BIKIN VEKTOR DI SINI
            vec = json.dumps(model.encode(item['text']).tolist())
            
            values.append(f"('{title}', '{content}', '{cat}', '{cit}', {sacred}, '{vec}', '{now}', '{now}')")
        
        f.write(",\n".join(values) + ";")
    print("✅ File SQL Siap! Kirim 'seed_cultural_chunks.sql' ke Tim Web.")

if __name__ == "__main__": generate_sql()