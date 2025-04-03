<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Help - Protein Analysis Tool</title>
    <link rel="stylesheet" href="/~s2694679/Website/assets/style.css">
</head>
<body>
    <div class="help-container">
        <div class="back-link">
            <a href="index.php">&#11013;Home</a>
        </div>

        <h1>Help & Usage Guide</h1>

        <h2>&#128269; Protein Search</h2>
        <p>
            Enter a <strong>protein family</strong> (e.g., Glucose-6-phosphatase, ABC transporters, kinases) and a <strong>taxonomic group</strong> (e.g., Aves, mammals, rodents) to fetch protein sequences from the <a href="https://www.ncbi.nlm.nih.gov/" target="_blank"> NCBI</a> database.
            You can specify the number of sequences you'd like to retrieve too (response times will vary!).
        </p>
        <p>
            After the search, results are displayed in a table where you can select individual proteins to <strong>store</strong> for further analysis.
        </p>

        <h2>&#129516; Conservation Analysis</h2>
        <p>
            This analysis performs a <strong>multiple sequence alignment</strong> of the stored sequences and highlights regions of high and low conservation.
            Conserved regions are areas that remain relatively similar across species, which often indicates <strong>important structural or functional roles</strong>.
        </p>
        <p>
            This can help you:
            <ul>
                <li>Identify <a href="https://proteopedia.org/wiki/index.php/Introduction_to_Evolutionary_Conservation" target="_blank"> evolutionary</a> concerved domains</li>
                <li>Suggest key residues for structural stability - <a href="https://academic.oup.com/nar/article/27/5/1223/2901949" target="_blank"> example</a></li>
                <li>Prioritise regions for experimental mutation or study</li>
            </ul>
        </p>

        <h2>&#128269; Motif Analysis</h2>
        <p>
        <a href="https://biopython-tutorial.readthedocs.io/en/latest/notebooks/14%20-%20Sequence%20motif%20analysis%20using%20Bio.motifs.html" target="_blank"> Motif analysis</a> scans your proteins against the <strong><a href="https://prosite.expasy.org/" target="_blank"> PROSITE</a> database</strong> to detect known short functional patterns (motifs).
            These motifs can indicate:
            <ul>
                <li>Enzyme active sites</li>
                <li><a href="https://fiveable.me/computational-biology/unit-6/protein-sequence-analysis-motif-discovery/study-guide/0LMNaFkVLutpq8Iq" target="_blank"> Post-translational</a> modification sites (e.g., phosphorylation, glycosylation)</li>
                <li>Binding domains for DNA, RNA, or other proteins</li>
            </ul>
        </p>
        <p>
            By understanding the motif distribution, you gain insight into <strong>protein function, regulation, and interaction potential</strong>.
        </p>

        <h2>&#128161; Tips</h2>
        <ul>
            <li>Use specific and correctly spelled terms when searching.</li>
            <li>Try running analyses on proteins from the same family for more meaningful conservation and motif comparisons.</li>
            <li>You can revisit and re-run past queries from the same session using the "Query History" page.</li>
        </ul>

        <p style="margin-top: 2em;">Still stuck? Feel free to go back <a href="index.php"> home</a> and try another search!</p>
    </div>
</body>
</html>
