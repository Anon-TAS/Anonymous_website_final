<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About This Website</title>
    <link rel="stylesheet" href="/~s2694679/Website/assets/style.css">
</head>
<body>
    <div class="page-wrapper">
        <div class="container">

            <div class="back-link">
                <a href="index.php">&#11013;Home</a>
            </div>

            <h1>About This Website</h1>

            <div class="main-results">
                <p>This web application allows users to analyse protein sequences and discover biologically significant motifs.</p>

                <h2>&#128269; What It Does</h2>
                <ul>
                    <li>Search protein sequences in FASTA format</li>
                    <li>Conduct conservation and alignment analysis across species</li>
                    <li>Automatically identify recurring motifs</li>
                    <li>View frequency charts and positional distribution of motifs</li>
                </ul>

                <h2>&#128202; Database and Schema Design</h2>
                <p>This website used a relational database (MySQL) to store the user submitted sequences, motif analusis results and session data.</p>
                <ul>
                    <li>Session isolation – each user has a unique session_id that ties their data together and means many users can use site at the same time</li>
                    <li>Sequences SQL Table - stores protein name, accession, taxon, query_id and session id.</li>
                    <li>Motif SQL Table - stores accession, motif name, start and end position and session id</li>
                    <li>Query SQL Table - stores query information so the user can revisit previous queries to regenerate analysis </li>
                    <li><a href="https://github.com/Anon-TAS/Website_Coursework_Anonymous" target="_blank"> GitHub</a> - Want to check out the code? Have a look at the GitHub repository! <strong>NOTE FOR MARKER: Repository anonymous BUT still has my name on it and cannot remove! (kept it in to show the code is shared)</strong> </li>
                </ul>

                <h2>&#129514; Demo Dataset</h2>
                <p>You can explore using an example dataset of <strong>glucose-6-phosphatase proteins</strong> from Aves to 'try before you buy'!</p>

                <h2>&#128101; Who It's For</h2>
                <p>This tool is aimed at bioinformatics/data science students, researchers, and educators who are looking to understand motif patterns and conservation across protein sequences.</p>

                <h2>&#128736; Technologies & Tools Used</h2>
                <ul>
                    <li>PHP & MySQL (for dynamic content and data storage)</li>
                    <li>Python scripts (for fetching sequences, concervation analysis, backend motif analysis and plotting)</li>
                    <li><a href="https://matplotlib.org/" target="_blank"> Matplotlib</a> - used for conservation and matif analysis plots. I did think t use tools like EMBOSS plotcon but I am a lot more familiar with matplotlib, allowing me to have more control of this process.</li>
                    <li><a href="https://www.w3schools.com/xml/ajax_intro.asp" target="_blank"> AJAX</a> to fetch and display sequences dynamically without reloading the page</li>
                    <li><a href="https://www.chartjs.org/" target="_blank"> Chart.js</a> for cool interactive visualisations</li>
                    <li><a href="https://www.ncbi.nlm.nih.gov/books/NBK25501/" target="_blank"> NCBI Entrez API</a> – Used to dynamically fetch protein sequences based on user-defined queries (protein family, taxonomic group, and limit)</li>
                    <li><a href="https://emboss.sourceforge.net/apps/cvs/emboss/apps/patmatmotifs.html" target="_blank"> EMBOSS patmatmotifs</a> – Command-line tool used for identifying known protein motifs against PROSITE motif database</li>
                    <li><a href="https://biopython-tutorial.readthedocs.io/en/latest/notebooks/14%20-%20Sequence%20motif%20analysis%20using%20Bio.motifs.html" target="_blank"> Biopython</a> - Tool used for For FASTA parsing (SeqIO) and alignment processing (AlignIO)</li>
                    <li>Various responsive design via CSS stylesheet</li>
                </ul>

                <h2>&#127891;Acknowledgements</h2>
                <p>This website was developed as part of the <strong>Introduction to Website and Database Design</strong> coursework. Special thanks to the teaching staff for providing the lecture content, guidance, and support throughout the semester.</p>
            </div>

        </div>
    </div>
</body>
</html>
