<?php
session_start();
$session_id = session_id();

require '/home/s2694679/public_html/Website/database/login.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get past queries for this session
$stmt = $pdo->prepare("SELECT * FROM query_history WHERE session_id = :session_id ORDER BY timestamp DESC");
$stmt->execute([':session_id' => $session_id]);
$queries = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Query History</title>
    <link rel="icon" href="/~s2694679/Website/images/logo.png" type="image/png">
    <link rel="stylesheet" href="/~s2694679/Website/assets/style.css">
</head>
<body>
    <div class="container">
        <div class="back-link">
            <a href="index.php">&#11013; Home</a>
        </div>

        <h1>&#128338; Your Query History</h1>

        <?php if (count($queries) > 0): ?>
            <table>
                <tr>
                    <th>Protein Family</th>
                    <th>Taxonomic Group</th>
                    <th>Returned</th>
                    <th>&#128338;</th>
                    <th> &#128257;</th> 
                </tr>
                <?php foreach ($queries as $q): ?>
                    <tr>
                        <td><?= htmlspecialchars($q['protein_family']) ?></td>
                        <td><?= htmlspecialchars($q['taxonomic_group']) ?></td>
                        <td><?= (int)$q['retmax'] ?></td>
                        <td><?= date("Y-m-d H:i", strtotime($q['timestamp'])) ?></td>
                        <td>
                            <!--https://www.php.net/manual/en/function.urlencode.php - implement a rerun button by passing the original parameters back to sequences.php -->
                            <a href="sequences.php?protein_family=<?= urlencode($q['protein_family']) ?>&taxonomic_group=<?= urlencode($q['taxonomic_group']) ?>&retmax=<?= (int)$q['retmax'] ?>"> 
                                Re-run
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p style="text-align: center;">No queries found for this session.</p>
        <?php endif; ?>
    </div>
</body>
</html>