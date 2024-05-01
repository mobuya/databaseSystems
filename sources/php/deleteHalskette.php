<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

$produktID = $_POST['produktID'];
$bestellungNr = $_POST['bestellungsNr'];

$halskette = $database->getHalskette($produktID);
$success = $database->deleteHalskette($produktID);


if($success) {
    $database->reduceBestellungPreis($bestellungNr, $halskette['PREIS']);
    header("Refresh: 0; URL=bestellungInfo.php?bestellungsNummer=" . urlencode($bestellungNr));
} else {
    echo "ERROR";
}
?>

   