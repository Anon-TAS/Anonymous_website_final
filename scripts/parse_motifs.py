import os
import re

# file paths
MOTIFS_FILE = "/home/s2694679/public_html/Website/motifs.txt"
PARSED_FILE = "/home/s2694679/public_html/Website/motifs_parsed.txt"

def parse_motifs():
    if not os.path.exists(MOTIFS_FILE):
        print("Error: motifs.txt not found!")
        return

    with open(MOTIFS_FILE, "r") as f:
        content = f.readlines()

    if not content:
        print("Error: motifs.txt is empty!")
        return

    parsed_motifs = []
    current_accession = None
    motif_name = None
    start_pos = None
    end_pos = None

    print("Debug: Parsing motifs.txt ...")

    for i in range(len(content)):
        line = content[i].strip()

        #debug print
        print(f"Line {i}: {line}")

        # get the accession number
        if line.startswith("# Sequence:"):
            match = re.search(r"Sequence:\s+(\S+)", line)
            if match:
                current_accession = match.group(1)
                print(f"Found accession: {current_accession}")

        #Get the start pos
        if line.startswith("Start = position"):
            start_match = re.search(r"Start = position (\d+)", line)
            if start_match:
                start_pos = start_match.group(1)
                print(f"Start position: {start_pos}")

        #Get the end pos
        if line.startswith("End = position"):
            end_match = re.search(r"End = position (\d+)", line)
            if end_match:
                end_pos = end_match.group(1)
                print(f"End position: {end_pos}")

        #Get the motif name
        if line.startswith("Motif ="):
            motif_name = line.split("=")[-1].strip()
            print(f"Motif name: {motif_name}")

        #save the motif data only when all data is found
        if motif_name and start_pos and end_pos and current_accession:
            parsed_motifs.append(f"{current_accession}|{motif_name}|{start_pos}|{end_pos}")
            print(f"Extracted motif: {current_accession} | {motif_name} | {start_pos} - {end_pos}")

            #reset the variables for the next search
            motif_name = None
            start_pos = None
            end_pos = None

    #save the parsed motifs
    if parsed_motifs:
        with open(PARSED_FILE, "w") as f:
            f.write("\n".join(parsed_motifs))
        print("Successfully parsed motifs!")
    else:
        print("No motifs were found in motifs.txt.")

#run the function
parse_motifs()
