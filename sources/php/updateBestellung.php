<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

$bestellungsNr = $_POST['bestellungsNr'];

$success = $database->updateBestellung($bestellungsNr);
if($success){
    $bestellung = $database->getBestellungInfo($bestellungsNr);
}
?>    

<!DOCTYPE html>
<html>
<head>
<style>
    body {
        font-family: 'Trebuchet MS';
        font-weight: bold;
        background-color: #fffbef;
        text-shadow: 2px 2px 4px rgba(128, 0, 128, 0.2);
    }
    .content {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 80vh; 
        text-align: center;
    }
    input[type="submit"] {
        font-size: 18px;
        padding: 10px 20px;
        background-color: #f67eb4;
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
        color: #f5aecf;
        background-color: #fffbef;
    }
</style>
</head>
<body>
<div class="content">
    <img src="endeBestellung.jpg" height="350" width="350">
   <h1> Bestellungsinfo: </h1>
   ID: <?php echo $bestellung['BESTELLUNGSNUMMER']; ?> <br>
   Abholungsdatum : <?php echo $bestellung['ABHOLUNGSDATUM']; ?> <br>
   Preis : <?php echo $bestellung['GESAMTPREIS']; ?> € <br>
   Deine E-Mail: <?php echo $bestellung['KUNDE_EMAIL']; ?> <br>
  <br>
  <br>
  Auf deinem Profil unter "Meine Bestellungen" kannst du deine Bestellungenbearbeiten!  
  <form method="post" action="kundeProfil.php">
        <input type="hidden" name="kundeEmail" value="<?php echo $bestellung['KUNDE_EMAIL']; ?>">
        <input type="submit" value="Zurück zum Profil">
    </form>

</div>
</body>
</html>