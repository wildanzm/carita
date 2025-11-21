# INI YANG BENAR (Copy-paste kode lengkap di bawah ini ke storyteller.py)
import os
from groq import Groq
from dotenv import load_dotenv

load_dotenv()
client = Groq(api_key=os.environ.get("GROQ_API_KEY"))

# PERBAIKAN DI BARIS INI: Tambahkan parameter 'source'
def generate_story(motif_name, context_data, source, language="Indonesia"):
    
    # Logika Bahasa
    instruction = "Gunakan Bahasa Indonesia yang puitis."
    if language.lower() == "sunda":
        instruction = "Gunakan **Bahasa Sunda** yang halus (Lemes)."
    elif language.lower() == "inggris":
        instruction = "Gunakan **Bahasa Inggris** yang elegan."

    # Prompt
    prompt = f"""
    Kamu adalah 'CARITA', Copywriter Budaya.
    TUGAS: Buat caption Instagram untuk "{motif_name}".
    
    DATA FAKTA: "{context_data}" 
    SUMBER: {source}
    
    ATURAN:
    1. {instruction}
    2. Jelaskan filosofi berdasarkan data fakta.
    3. Akhiri dengan ajakan membeli (Call to Action).
    4. Maksimal 3-4 kalimat.
    """

    try:
        chat = client.chat.completions.create(
            messages=[{"role": "user", "content": prompt}],
            model="llama-3.3-70b-versatile",
        )
        return chat.choices[0].message.content
    except Exception as e:
        return f"Maaf, error cerita: {str(e)}"