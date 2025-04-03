<?php
session_start();
$session_id = session_id();
require '/home/s2694679/public_html/Website/database/login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Protein Sequence Analysis</title>
    <link rel="stylesheet" href="/~s2694679/Website/assets/style.css">
</head>
<body>
    <header class="top-bar">
        <div class="logo">
            <a href="https://www.flaticon.com/free-icons/protein" target="_blank" rel="noopener noreferrer">
                <img src="images/logo.png" alt="Logo" />
            </a>
        </div>
        <nav class="nav-links">
            <a href="query.php">Query History</a>
            <a href="about.php">About</a>
            <a href="help.php">Help</a>
            <a href="statement_of_credit.php">Credits</a>
        </nav>
    </header>

    <main class="home-content">
        <h1>Protein Sequence Analysis</h1>
        <p class="description">
            Welcome to your protein sequence analysis tool! Enter a protein family and taxonomic group below to retrieve sequences from the NCBI database and begin your analysis journey!!!
        </p>

        <form action="sequences.php" method="POST" class="search-form">
            <input type="text" name="protein_family" placeholder="Protein Family (e.g. glucose-6-phosphatase)" required> <!-- creating the inputs which can later be used for database searches based on what you put in these -->
            <input type="text" name="taxonomic_group" placeholder="Taxonomic Group (e.g. Aves)" required>
            <select name="retmax">
                <option value="10">10 results</option>
                <option value="50">50 results</option>
                <option value="100">100 results</option>
                <option value="1000">1000 results (will take longer to load)</option>
                <option value="100000">ALL</option> <!-- Will return the maximum amount of results but will vary depending on query so set it to 100000 just to be safe-->
            </select>
            <button type="submit">Get Sequences</button>
        </form>
         <form action="example.php" method="POST"> <!-- links to the preloaded dataset if user does not know what to input or try an example which works 100% -->
            <button type="submit">Try Example Dataset?!</button>
        </form>

    </main>
</body>
</html>
