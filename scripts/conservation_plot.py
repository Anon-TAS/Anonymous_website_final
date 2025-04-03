from Bio import AlignIO
import numpy as np
import matplotlib.pyplot as plt
from collections import Counter
import math

def shannon_entropy(column):
    total = len(column)
    counts = Counter(column)
    freqs = [count / total for count in counts.values()]
    return -sum(f * math.log2(f) for f in freqs if f > 0)

# Load aligned sequences
alignment = AlignIO.read("aligned.fasta", "fasta")
scores = []

for i in range(alignment.get_alignment_length()):
    column = [record.seq[i] for record in alignment]
    entropy = shannon_entropy(column)
    max_entropy = math.log2(20)  # Normalise for amino acids
    conservation = 1 - (entropy / max_entropy)
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