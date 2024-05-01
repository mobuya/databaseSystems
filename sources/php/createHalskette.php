<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

$halskette = $_POST['halskette'];
$bestellungsNr = $_GET['bestellungsNr'];
$groesse = $_POST['groesse'];
echo $halskette. " " . $bestellungsNr . "  " . $groesse;

$success = $database->insertIntoHalskette($halskette, $groesse, $bestellungsNr);

if($success) {
    header("Location: addToBestellung.php?bestellungsNr=" . urlencode($bestellungsNr));
    exit;
}

?>  