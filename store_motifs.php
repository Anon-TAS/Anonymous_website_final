<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$session_id = session_id();
echo "<p>Session ID being used to store motifs: <strong>$session_id</strong></p>";

require '/home/s2694679/public_html/Website/database/login.php';

// Delete existing motifs for this session
$delete = $pdo->prepare("DELETE FROM motifs WHERE session_id = :session_id");
$delete->execute([':session_id' => $session_id]);
echo "<p>Deleted existing motifs for this session.</p>";

// Load parsed motifs
$motif_file = "/home/s2694679/public_html/Website/motifs_parsed.txt";

if (!file_exists($motif_file)) {
    die("<p>Error: Motif results file not found.</p>");
}

$motifs = file($motif_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

if (empty($motifs)) {
    die("<p>No motif results found in the file.</p>");
}

echo "<p>Found " . count($motifs) . " motif lines to insert.</p>";

$sql = "INSERT INTO motifs (accession, motif_name, start_pos, end_pos, session_id)
        VALUES (:accession, :motif_name, :start_pos, :end_pos, :session_id)";
$stmt = $pdo->prepare($sql);

$inserted = 0;

foreach ($motifs as $line) {
    $parts = explode("|", $line);

    if (count($parts) !== 4) {
        echo "<p>Skipping malformed line: $line</p>";
        continue;
    }

    list($accession, $motif_name, $start_pos, $end_pos) = $parts;

    $stmt->execute([
        ':accession' => $accession,
        ':motif_name' => $motif_name,
        ':start_pos' => $start_pos,
        ':end_pos' => $end_pos,
        ':session_id' => $session_id
    ]);

    $inserted++;
    echo "<p>Inserted: $accession | $motif_name | $start_pos | $end_pos</p>";
}

echo "<p><strong>Total motifs stored: $inserted</strong></p>";
?>
