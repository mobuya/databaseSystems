<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

$produktID = $_POST['produktID'];
$bestellungNr = $_POST['bestellungsNr'];

$ohrring = $database->getOhrring($produktID);
$success = $database->deleteOhrring($produktID);

if($success) {
   $database->reduceBestellungPreis($bestellungNr, $ohrring['PREIS']);
    header("Refresh: 0; URL=bestellungInfo.php?bestellungsNummer=" . urlencode($bestellungNr));
} else {
    echo "ERROR";
}
?>

