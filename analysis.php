<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session safely
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$session_id = session_id();

require '/home/s2694679/public_html/Website/database/login.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Generate FASTA file (previously had a fetch_fasta.php but that become obsolete when deciding i wanted each user to have a unique session)
    $sql = "SELECT accession, sequence FROM sequences WHERE session_id = :session_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':session_id' => $session_id]);
    $sequences = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $fasta_file = '/home/s2694679/public_html/Website/user_sequences.fasta';
    file_put_contents($fasta_file, "");

    foreach ($sequences as $seq) {
        $accession = htmlspecialchars($seq['accession']);
        $sequence = wordwrap($seq['sequence'], 60, "\n", true);
        file_put_contents($fasta_file, ">$accession\n$sequence\n", FILE_APPEND);
    }

    // Run the analysis python code!
    shell_exec("python3 /home/s2694679/public_html/Website/scripts/motif_analysis.py");
    shell_exec("python3 /home/s2694679/public_html/Website/scripts/parse_motifs.py");
    shell_exec("python3 /home/s2694679/public_html/Website/scripts/motif_plot.py");

    // store the motifs by rinning the store_motifs.php
    ob_start(); // Prevent output from interfering with header()
    require '/home/s2694679/public_html/Website/store_motifs.php';
    ob_end_clean();

    // Redirect to avoid it keep resubmitting after i refresh (it kept duplicating results as i refreshed)
    header("Location: analysis.php");
    exit;
}

// get the motifs stored on the new SQL table and filter by the users session id to only get their results
$sql = "SELECT * FROM motifs WHERE session_id = :session_id ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute([':session_id' => $session_id]);
$motifs = $stmt->fetchAll(PDO::FETCH_ASSOC);

//top motifs for aditional analysis!
$sql = "SELECT motif_name, COUNT(*) AS frequency 
        FROM motifs 
        WHERE session_id = :session_id 
        GROUP BY motif_name 
        ORDER BY frequency DESC 
        LIMIT 10";
$stmt = $pdo->prepare($sql);
$stmt->execute([':session_id' => $session_id]);
$top_motifs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
//Build position bins (group start positions by motif name into the ranges)
$position_bins = [];
$bin_size = 50;

foreach ($motifs as $motif) {
    $motif_name = $motif['motif_name'];
    $start = (int)$motif['start_pos'];
    $bin = floor($start / $bin_size) * $bin_size;

    $bin_label = "{$bin}-" . ($bin + $bin_size - 1);
    if (!isset($position_bins[$motif_name][$bin_label])) {
        $position_bins[$motif_name][$bin_label] = 0;
    }
    $position_bins[$motif_name][$bin_label]++;
}

//Convert to js ready format
$all_bins = [];
foreach ($position_bins as $motif_data) {
    $all_bins = array_merge($all_bins, array_keys($motif_data));
}
$all_bins = array_values(array_unique($all_bins));
sort($all_bins); // Keep bin order consistent

$position_chart_data = [];
foreach ($position_bins as $motif_name => $counts) {
    $row = ['label' => $motif_name, 'data' => []];
    foreach ($all_bins as $bin) {
        $row['data'][] = $counts[$bin] ?? 0;
    }
    $position_chart_data[] = $row;}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Motif Analysis</title>
    <link rel="stylesheet" href="/~s2694679/Website/assets/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/~s2694679/Website/scripts/position_chart.js"></script>    
</head>
<body>

<div class="back-link">
    <a href="index.php">&#11013;Home</a> <!--https://symbl.cc/en/2B05-left-arrow-emoji/ - cool symbols-->
</div>
    <div class="page-wrapper">

        <div class="container">
                        
            <div class="back-link">
                <a href="sequences.php">&#8617;Back to Sequences</a>
            </div>
            
            <h1>Motif Analysis Results</h1>
            
            <?php if (count($motifs) > 0): ?>
                <div class="results-flex-wrapper">

                    <div class="table-container">

                        <div class="main-results">
                            <table>
                                <tr>
                                    <th>Accession</th>
                                    <th>Motif Name</th>
                                    <th>Start Position</th>
                                    <th>End Position</th>
                                </tr>
                                <?php foreach ($motifs as $motif): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($motif['accession']) ?></td>
                                        <td><?= htmlspecialchars($motif['motif_name']) ?></td>
                                        <td><?= htmlspecialchars($motif['start_pos']) ?></td>
                                        <td><?= htmlspecialchars($motif['end_pos']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                    
                    <div class="right-column">
                        
                        <div class="top-motifs">
                            <h2>Top Motifs Across Selected Sequences</h2>
                            <table>
                                <tr>
                                    <th>Motif Name</th>
                                    <th>Frequency</th>
                                </tr>
                                <?php foreach ($top_motifs as $motif): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($motif['motif_name']) ?></td>
                                        <td><?= $motif['frequency'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                    
                            <div class="motif-plot">
                                <h2>Motif Frequency Overview</h2>
                                <img src="/~s2694679/Website/assets/motif_plot.png" alt="Motif Frequency Chart">
                            </div>
                            <div class="motif-plot">
                                <h2>Motif Position Distribution</h2>
                                <canvas id="positionChart" height="300"></canvas>
                            </div>
                            <script>
                                const positionLabels = <?= json_encode($all_bins) ?>;
                                const positionDatasets = <?= json_encode($position_chart_data) ?>;
                                renderPositionChart(positionLabels, positionDatasets);
                            </script>
                        </div>
                    </div>
                </div>

            <?php else: ?>
                <p class="no-results"><strong>No motifs found for your session. Run analysis below.</strong></p>
            <?php endif; ?>

        </div>
    </div>
</body>
</html>
