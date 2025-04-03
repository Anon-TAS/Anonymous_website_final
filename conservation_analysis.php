<?php
session_start();
$session_id = session_id();

require '/home/s2694679/public_html/Website/database/login.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

//defining file path
$input_path = '/home/s2694679/public_html/Website/input.fasta';
$aligned_path = '/home/s2694679/public_html/Website/aligned.fasta';
$python_script = '/home/s2694679/public_html/Website/scripts/conservation_plot.py';
$clustal_path = '/usr/bin/clustalo'; // make sure its choosing the tool correct as was sometimes not working as it should.

// Fetch the stored sequences for current session
$sql = "SELECT sequence, accession FROM sequences WHERE session_id = :session_id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':session_id' => $session_id]);
$sequences = $stmt->fetchAll(PDO::FETCH_ASSOC);

//exit early if no sequences found
if (count($sequences) == 0) {
    echo "<p>No sequences stored for conservation analysis.</p>";
    exit;
}

//Write sequences to input.fasta which is the input for alignment https://www.php.net/manual/en/function.file-put-contents.php
file_put_contents($input_path, "");

foreach ($sequences as $seq) {
    $header = ">" . $seq['accession'];//the fasta header line
    $sequence = strtoupper(trim($seq['sequence'])); //need to clean up the format to can progress further
    file_put_contents($input_path, "$header\n$sequence\n", FILE_APPEND);
}

// run clustal omega to perform the multiple sequence alignment using the formatted fasta documents
$clustal_command = "$clustal_path -i $input_path -o $aligned_path --outfmt=fasta --force";
exec($clustal_command . " 2>&1", $output, $return_var); 
if ($return_var !== 0) {
    echo "<p>Error running Clustal Omega! Return code: $return_var</p>";// if the alignmnet failed display the error and log the output
    echo "<pre>" . implode("\n", $output) . "</pre>";
    exit;
}

// generate the plot using the python script i made
$python_command = "python3 $python_script";
exec($python_command . " 2>&1", $py_output, $py_return);
if ($py_return !== 0) {//if the potting failed show the error (debugging step)
    echo "<p>Error generating conservation plot!</p>";
    echo "<pre>" . implode("\n", $py_output) . "</pre>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Conservation Analysis</title>
    <link rel="icon" href="/~s2694679/Website/images/logo.png" type="image/png">
    <link rel="stylesheet" href="/~s2694679/Website/assets/style.css">
</head>
<body>
    <div class="conservation-box">
        <h2>Protein Conservation Analysis</h2>
        <p>Conservation across your aligned protein sequences:</p>
        <img src="/~s2694679/Website/assets/conservation_plot.png" alt="Conservation Plot" style="max-width: 100%; border: 1px solid #ccc;">
        <br><br>
    </div>
</body>
</html>