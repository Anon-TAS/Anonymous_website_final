import sys
from Bio import Entrez, SeqIO

NCBI_API_KEY = 'e6252172f23066d94633fd98ca398d744907'#key to increase request limit

Entrez.email = "tommyscott2110@gmail.com" #login stuff
Entrez.api_key = NCBI_API_KEY

#Main function to fetch sequences from NCBI based on protein family + taxonomic group
def fetch_sequences(protein, taxon, retmax):
    print(f"Searching NCBI Database for: {protein} in {taxon}, retrieving {retmax} sequences") #check that its running properly
    query = f"{protein} AND {taxon}[Organism]"
    handle = Entrez.esearch(db="protein", term=query, retmax=retmax, api_key=Entrez.api_key)
    record = Entrez.read(handle)
    ids = record.get("IdList", [])
    if not ids:
        print("No Sequences Found!")
        return
#fetch sequences by ID in fasta format
    handle = Entrez.efetch(db="protein", id=ids, rettype="fasta", retmode="text", api_key=Entrez.api_key)

#read and print the ful fasta formatted sequence string
    try:
        sequences = handle.read()
        print("Sequences Retrieved!!")
        print(sequences)
    except Exception as e:
        print(f"Error Obtaining Sequences: {e}")
#entry ppoint when the script is run from the commad line https://builtin.com/articles/name-python#:~:text=The%20%E2%80%9Cif%20__%20name%20__,the%20name%20of%20the%20module.
if __name__ == "__main__":
    if len(sys.argv) < 4:
        print("Missing Inputs: Provide protein family, taxon, and retmax")
    else:
        fetch_sequences(sys.argv[1], sys.argv[2], int(sys.argv[3]))#argument values from chosen parameters
