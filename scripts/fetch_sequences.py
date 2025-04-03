import sys
from Bio import Entrez, SeqIO

NCBI_API_KEY = 'e6252172f23066d94633fd98ca398d744907'

Entrez.email = "tommyscott2110@gmail.com"
Entrez.api_key = NCBI_API_KEY

def fetch_sequences(protein, taxon, retmax):
    print(f"Searching NCBI Database for: {protein} in {taxon}, retrieving {retmax} sequences")
    query = f"{protein} AND {taxon}[Organism]"
    handle = Entrez.esearch(db="protein", term=query, retmax=retmax, api_key=Entrez.api_key)
    record = Entrez.read(handle)
    ids = record.get("IdList", [])
    if not ids:
        print("No Sequences Found!")
        return

    handle = Entrez.efetch(db="protein", id=ids, rettype="fasta", retmode="text", api_key=Entrez.api_key)

    try:
        sequences = handle.read()
        print("Sequences Retrieved!!")
        print(sequences)
    except Exception as e:
        print(f"Error Obtaining Sequences: {e}")

if __name__ == "__main__":
    if len(sys.argv) < 4:
        print("Missing Inputs: Provide protein family, taxon, and retmax")
    else:
        fetch_sequences(sys.argv[1], sys.argv[2], int(sys.argv[3]))
