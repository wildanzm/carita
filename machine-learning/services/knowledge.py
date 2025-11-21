import json
import os

# Lokasi data
DATA_PATH = os.path.join("data", "knowledge_base.json")

def get_motif_data(motif_id):
    """Mencari data motif berdasarkan ID di file JSON lokal"""
    try:
        with open(DATA_PATH, 'r') as f:
            data = json.load(f)
            
        # Cari item yang id-nya cocok
        for item in data:
            if item['id'] == motif_id:
                return {
                    "found": True,
                    "text": item['text'],
                    "source": item['metadata']['source'],
                    "category": item['metadata']['category'],
                    "is_sacred": item['metadata']['is_sacred'] == "True"
                }
        return {"found": False}
        
    except Exception as e:
        return {"found": False, "error": str(e)}