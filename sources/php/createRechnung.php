<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

$bestellungsNr = $_POST['bestellungsNr'];
$zahlungsart = $_POST['zahlungsart'];

$rechnungsnummer = $database->createRechnungProcedure($bestellungsNr, $zahlungsart);


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
    .content {
        margin-top: 40px;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            display: flex; 
            flex-direction: column; 
            align-items: center; 
    
    }
    input[type="submit"] {
        font-size: 28px;
        padding: 10px 20px;
        background-color: #e9cbf7;
        border: 2px solid #d3a7e8;
        color: white;
        text-transform: uppercase;
        border: none;
        margin-left: 15px;
        font-family: 'Trebuchet MS';
        border-radius: 25px;
        cursor: pointer;
        text-shadow: 2px 2px 4px rgba(128, 0, 128, 0.2);
        margin-top: 30px;
    }
    input[type="submit"]:hover {
        color: #d3a7e8;
        background-color: white;
    }

</style>
<center><h1 style="font-size: 50px;">Danke für deine Bestellung!</h1></center>
<center>Deine Rechnungsnummer: <?php echo " " . $rechnungsnummer; ?></center>
</head>

<body>
<div class="content">
Als Dankeschön für deine Unterstützung, erhälst du 25% Rabatt!
<form method="post" action="updateBestellung.php">
<input type="hidden" name="bestellungsNr" value="<?php echo $bestellungsNr; ?>"> 
<input type="submit" value="Gutschein einlösen!">
</form>
<br>
<br>
<img src="allFinalCharacters.jpg"> 
</div>

</body>
</html>