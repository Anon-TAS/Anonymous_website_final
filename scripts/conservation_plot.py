from Bio import AlignIO
import numpy as np
import matplotlib.pyplot as plt
from collections import Counter
import math

#function to calculate shannon entropy for culumn of amino acids! https://en.wikipedia.org/wiki/Entropy_(information_theory)
def shannon_entropy(column):
    total = len(column)
    counts = Counter(column)
    freqs = [count / total for count in counts.values()]
    return -sum(f * math.log2(f) for f in freqs if f > 0)

# Load aligned sequences
alignment = AlignIO.read("aligned.fasta", "fasta")
scores = []

#Iterate over alignment columns (i.e., positions)
for i in range(alignment.get_alignment_length()):
    column = [record.seq[i] for record in alignment] # Get all residues at position i
    entropy = shannon_entropy(column) #Compute entropy
    max_entropy = math.log2(20)  #Max possible entropy for amino acids (20 AA residues which is ok as only standard amino acids occur)
    conservation = 1 - (entropy / max_entropy) #Normaliser
    scores.append(conservation)

# Plotting
plt.figure(figsize=(12, 4))
plt.plot(scores, label="Conservation Score")
plt.xlabel("Position in Alignment")
plt.ylabel("Conservation (1 - Entropy)")
plt.title("Protein Sequence Conservation Plot")
plt.grid(True)
plt.tight_layout()
plt.savefig("/home/s2694679/public_html/Website/assets/conservation_plot.png", dpi=300, transparent=True)