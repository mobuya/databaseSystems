<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();
$bestellungNr = $_POST['bestellungsNr'];

$pid1 = $_POST['pid1'];
$pid2 = $_POST['pid2'];
$message = '';

$ohrring1 = $database->getOhrring($pid1);
$ohrring2 = $database->getOhrring($pid2);

$success =  @ $database->insertOhrringPaar($pid1, $pid2);

if($success) {
    $message = $ohrring1['NAME'] . " und " . $ohrring2['NAME'] . " sind jetzt als Paar verpackt!";
    header("Refresh: 2; URL=bestellungInfo.php?bestellungsNummer=" . urlencode($bestellungNr));
} else {
    $message = "sind schon ein paar";
    header("Refresh: 1; URL=bestellungInfo.php?bestellungsNummer=" . urlencode($bestellungNr));
}

?>


<!DOCTYPE html>
<html>

<head>
    <style>
    body {
        font-family: 'Trebuchet MS';
        font-weight: bold;
        background: linear-gradient(0deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7)), url('BackgroundIndex.jpg');
        text-shadow: 2px 2px 4px rgba(128, 0, 128, 0.2);
    }
</style>
</head>
<body>
<center><h1 style="margin-top: 100px"> <?php echo $message; ?> </h1></center>    
</body>
</html>