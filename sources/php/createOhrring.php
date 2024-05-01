<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

$ohrring = $_POST['ohrring'];
$bestellungsNr = $_GET['bestellungsNr'];
echo $ohrring. " " . $bestellungsNr;

$success = $database->insertIntoOhrring($ohrring, $bestellungsNr);

if($success) {
    header("Location: addToBestellung.php?bestellungsNr=" . urlencode($bestellungsNr));
    exit;
}

?>