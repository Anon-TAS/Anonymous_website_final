import pandas as pd
import matplotlib.pyplot as plt

with open("/home/s2694679/public_html/Website/motifs_parsed.txt") as f:
    lines = [line.strip().split('|') for line in f if line.strip()]

motifs = [line[1] for line in lines if len(line) == 4]
df = pd.DataFrame(motifs, columns=["Motif"])

freq = df.value_counts().reset_index(name='Count')


plt.figure(figsize=(14, 6))
plt.bar(freq['Motif'], freq['Count'], color='cornflowerblue')
plt.title("Motif Frequency Across Selected Sequences", fontsize=20)
plt.xlabel("Motif Name",fontsize=20)
plt.ylabel("Frequency", fontsize=20)
plt.xticks(rotation=45, ha='right')
plt.tight_layout()

#save figure to display on page and incase want to do something with it later on
plt.savefig("/home/s2694679/public_html/Website/assets/motif_plot.png", dpi=300, bbox_inches='tight', transparent=True)
