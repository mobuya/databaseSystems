<?php

require_once('DatabaseHelper.php');
$database = new DatabaseHelper();


$designerID = $_POST['designerId'];
$assistentID = $_POST['assistentId'];
$bestellungsNr = $_POST['bestellungsNr'];
$bestellung = $database->getBestellungInfo($bestellungsNr);

$success = $database->insertIntoKreirenBestellung($bestellungsNr, $designerID, $assistentID);

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
    margin-top: 50px;
    align-items: center;
    justify-content: center;
    margin-bottom: 10px;
    display: flex; 
    flex-direction: column; 
    align-items: center; 
}

.content button {
    margin-top: 10px; 
}  
.button {
    font-size: 28px; 
    padding: 7px 7px; 
    background-color: #f385a0;
    color: white;
    text-transform: uppercase;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    margin-left: 15px;  
    text-shadow: 2px 2px 4px rgba(128, 0, 128, 0.2);
    font-weight: bold;
}
.button:hover {
    background-color: white;
    color: #f385a0;

} 
.button2 {
    font-size: 15px; 
    padding: 7px 7px; 
    opacity: 0.7;
    background-color: #ff5050;
    color: white;
    text-transform: uppercase;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    margin-left: 15px;  
    text-shadow: 2px 2px 4px rgba(128, 0, 128, 0.2);
    font-weight: bold;
}
.button2:hover {
    background-color: white;
    color: #ff5050;
} 
</style>
<br>
    <h1 style="margin-left: 30px";>Step 2/4</h1>
    <center><h1> Deine Bestellung wäre abholbar erst ab: <?php echo $bestellung['ABHOLUNGSDATUM']; ?> </h1></center>
    </head>
<body>
<div class="content">
<form method="post" action="addToBestellung.php">
<input type="hidden" name="bestellungsNr" value="<?php echo $bestellungsNr; ?>">
<button class="button" type="submit"> Ja, passt! </button>
</form>
<br> 
<br>
<form method="post" action="kundeProfil.php">
        <input type="hidden" name="kundeEmail" value="<?php echo $bestellung['KUNDE_EMAIL']; ?>">
        <button class="button2" type="submit"> Bestellung abbrechen </button>
    </form>
    <img src="package.jpg"  height="300" width="300">
</div>
</body>
</html>
