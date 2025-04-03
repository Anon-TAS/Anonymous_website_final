<?php
error_reporting(E_ALL);
ini_set('display_errors', 1); //full error reporting for debugging https://www.php.net/manual/en/function.ini-set.php

session_start();
$session_id = session_id(); //capture the session id to be used for database and results storage so many users can operate website at once.

require '/home/s2694679/public_html/Website/database/login.php'; //connecting to database via the preset PDO so users can access it but not manipulate the schema.
if (!isset($pdo)) {
    die("Error: Database connection is missing in login.php."); #error trapping incase pdo connection to database doesnt work
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fetched Sequences</title>
    <link rel="icon" href="/~s2694679/Website/images/logo.png" type="image/png">
    <link rel="stylesheet" href="/~s2694679/Website/assets/style.css"> <!-- External style sheet!-->
</head>
<body>
    <div class="container">

        <div class="back-link">
            <a href="index.php">&#11013;Home</a> <!--https://symbl.cc/en/2B05-left-arrow-emoji/ - cool symbols-->
        </div>

        <h1>Fetched Sequences</h1> <!-- if GET request is from example display this on top of page-->
        <?php if (isset($_GET['example'])): ?> <!-- conditional statement that if example dataset is click on homepage show this text to let them know that they are using example dataset. -->
            <div style="text-align: center; color: #444; font-size: 15px; margin-bottom: 20px;">
                <p>Example dataset of <strong>glucose-6-phosphatase proteins from Aves</strong>.</p>
                <p>Select proteins of interest using the checkboxes to process them through the analysis pipeline.</p>
                <p>You can store the proteins for inspection, then view their top motifs, and explore the functional regions.</p>
            </div>
        <?php endif; ?>

        <?php
        $output = $_SESSION['fasta_output'] ?? ""; // Load cached output if it exists

        //Run script if POST request is met based on the inputs from homepage
        if ($_SERVER["REQUEST_METHOD"] == "POST" || isset($_GET['protein_family'])) {// Determine protein family from POST (new search) or GET (query history rerun), and safely escape it
            $protein_family = isset($_POST['protein_family']) ? escapeshellarg($_POST['protein_family']) : escapeshellarg($_GET['protein_family']); #https://www.php.net/manual/en/function.escapeshellarg.php
            $taxonomic_group = isset($_POST['taxonomic_group']) ? escapeshellarg($_POST['taxonomic_group']) : escapeshellarg($_GET['taxonomic_group']);
            $retmax = isset($_POST['retmax']) ? (int)$_POST['retmax'] : (int)($_GET['retmax'] ?? 10);

            $script_path = "/home/s2694679/public_html/Website/scripts/fetch_sequences.py";
            if (!file_exists($script_path)) {
                die("Error: Script not found"); //check script exists for debugging.
            }

            $command = "python3 $script_path $protein_family $taxonomic_group $retmax";
            $output = shell_exec($command); //run the python scipt to fetch sequence
            $_SESSION['fasta_output'] = $output; //store the output in the session

        // store query in query history table for reuse
            $insert_query = "INSERT INTO query_history (session_id, protein_family, taxonomic_group, retmax)
            VALUES (:session_id, :protein_family, :taxonomic_group, :retmax)";

            $stmt = $pdo->prepare($insert_query);
            $stmt->execute([
                ':session_id' => $session_id,
                ':protein_family' => $_POST['protein_family'] ?? $_GET['protein_family'], #both post and get depending if from suery page or rerunning from query history
                ':taxonomic_group' => $_POST['taxonomic_group'] ?? $_GET['taxonomic_group'],
                ':retmax' => $retmax]);
            
        } elseif (isset($_GET['limit'])) {
            $output = $_SESSION['fasta_output'] ?? "";
        }

        $limit = isset($_GET['limit']) && $_GET['limit'] != 'all' ? (int)$_GET['limit'] : 100000; //results limit
        preg_match_all("/>([^ ]+) (.+?) \[(.+?)\]\n([A-Za-z\n]+)/", $output, $matches, PREG_SET_ORDER); //regex parse FASTA format - accession, protein name, taxon, sequence https://www.php.net/manual/en/function.preg-match-all.php

            //Table formatting
        if (!empty($matches)) {
            echo '<form action="store_selected.php" method="POST">';
            echo '<div class="scroll-container">';
            
            echo '<div class="sequences-table-wrapper">';
            echo '<table>
                    <tr>
                        <th>Select</th>
                        <th>Protein Name</th>
                        <th>Accession</th>
                        <th>Taxon</th>
                        <th>Sequence</th>
                    </tr>';
            
            // Limit how many entries to show
            $matches = array_slice($matches, 0, $limit);

            foreach ($matches as $match) {// Loop through each fasta entry and create table rows
                $accession = trim($match[1]);
                $protein_name = trim($match[2]);
                $taxon = trim($match[3]);
                $sequence = str_replace("\n", "", $match[4]);
//save the parsed data to the session so it can be reused in the future analysis
                $_SESSION['parsed_sequences'][$accession] = [
                    'protein_name' => $protein_name,
                    'taxon' => $taxon,
                    'sequence' => $sequence
                ];
// print each protein row with checkbox for so can choose specific results rather than all!
                echo "<tr>
                        <td><input type='checkbox' name='selected_sequences[]' value='" . htmlspecialchars($accession) . "'></td>
                        <td>" . htmlspecialchars($protein_name) . "</td>
                        <td>" . htmlspecialchars($accession) . "</td>
                        <td>" . htmlspecialchars($taxon) . "</td>
                        <td><div class='sequence-container'>" . htmlspecialchars($sequence) . "</div></td>
                    </tr>";
            }

            echo '</table>';
            echo '</div>';
            echo '</div>';
            ?>
            <div style="text-align: center;">
                <p style="font-size: 15px; color: #333;">
                &#8592; Scroll to see more of the sequence &#8594;
                </p>

                <form method="post">
                    <button type="submit" class="store-button">
                        Store Selected Sequences
                    </button>
                </form>
            </div>
            
            <?php
            echo '</form>';
            } else {
                //if there are no sequences matched to query
                echo "
                <div style='text-align: center; margin-top: 30px;'>
                    <h3>No sequences found:(</h3>
                    <p>Please check your spelling and make sure the query is valid!</p>
                    <img src='https://media2.giphy.com/media/v1.Y2lkPTc5MGI3NjExNmg1eTFyNmlhbjRzc3l2OTQ0cTd4OXNhb2xqcjVtcXN2eHlwYzJlYSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/YTzh3zw4mj1XpjjiIb/giphy.gif' alt='No results image' style='max-width: 300px; margin-top: 15px; border-radius: 8px;'> 
                </div>";
            }
# Fun gifs to display on page - https://giphy.com/search/error

        ?>


        <div style="text-align: center; margin-top: 10px;">
            <a href="store_selected.php">View Stored Sequences</a>
        </div>

    </div>
</body>
</html>