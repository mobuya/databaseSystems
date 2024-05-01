<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

$bestellungsNr = '';

if(isset($_POST['bestellungsNr'])){
    $bestellungsNr = $_POST['bestellungsNr'];
}

if(isset($_GET['bestellungsNr'])){
    $bestellungsNr = $_GET['bestellungsNr'];
}

$bestellung  = $database->getBestellungInfo($bestellungsNr);

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
    .button {
        margin: 0 auto;
        margin-top: 20px;
        background-color: #e9cbf7; 
        border: 2px solid #d3a7e8;
        color: black;
        padding: 7px 15px;
        font-size: 20px;
        border-radius: 9px;
    }
    .button:hover {
        background-color: #d3a7e8;
        color: white;
    } /*cancell-button*/
    .button2 {
        position: absolute;
        top: 80px;
        right: 50px;
        background-color:  #ff5050; 
        border: none;
        opacity: 0.6;
        text-transform: uppercase;
        color: white;
        padding: 7px 15px;
        font-size: 14px;
        border-radius: 15px;
        cursor: pointer;
    }
    .button2:hover {
        background-color:  #cc0000;
        color: white;
    }
    .input-text {
        font-size: 15px;
        font-family: 'Trebuchet MS';
        margin-bottom: 10px;
        width: 200px;
    }
    .input-label {
        font-size: 20px;
        margin-bottom: 10px;
        margin-top: 10px;
        
    }
    input[type="submit"] {
        font-size: 14px;
        padding: 10px 20px;
        background-color: #e9cbf7;
        border: 2px solid #d3a7e8;
        color: white;
        border: none;
        text-transform: uppercase;
        margin-left: 15px;
        font-family: 'Trebuchet MS';
        border-radius: 25px;
        cursor: pointer;
        text-shadow: 2px 2px 4px rgba(128, 0, 128, 0.2);
         font-weight: bold;
    }
    input[type="submit"]:hover {
        color:#d3a7e8;
        background-color: white;
    }
    .form-container {
        display: flex;
        flex-direction: row;
        align-items: center;
    }
    .form-container form {
        margin-right: 10px;
    }
</style>
<br>
    <h1 style="margin-left: 30px";>Step 3/4</h1>
    <center><h1> Wähle deine Produkte aus: </h1></center> 
    <center><h2> Preis: <?php echo $bestellung['GESAMTPREIS']; ?> €</h2></center> 
    </head>
<body>
<div class="content">
<center>Beschreibe dein Produkt</center>
<br>
    <div class="form-container">
<form method="post" action="createOhrring.php?bestellungsNr=<?php echo $bestellungsNr; ?>">
<label for="ohrring">Ohrring:</label>
<input id="ohrring" name="ohrring" class="input-text" type="text" maxlength="50" required>
<input type="submit" value="Hinzufügen">
</form>
</div>
<br>
<div class="form-container">
<form method="post" action="createHalskette.php?bestellungsNr=<?php echo $bestellungsNr; ?>">
<label for="halskette">Halskette:</label>
<input id="halskette" name="halskette" class="input-text" type="text" maxlength="50"required>

<label for="groesse">Größe/Länge:</label>
<select id="groesse" name="groesse">
    <option value="XS">XS</option>
    <option value="S">S</option>
    <option value="M">M</option>
    <option value="L">L</option>
    <option value="XL">XL</option>
</select>
<input type="submit" value="Hinzufügen">
</form>
</div>
<br>
<div class="form-container">
 <?php if($bestellung['GESAMTPREIS'] != 0) { ?>   
<form method="post" action="createRechnung.php">
<input type="hidden" name="bestellungsNr" value="<?php echo $bestellungsNr; ?>">    
<label for="zahlungsart">Zahlungsart: </label>
<select id="zahlungsart" name="zahlungsart">
    <option value="Kreditkarte">Kreditkarte </option>
    <option value="Debitkarte">Debitkarte </option>
    <option value="PayPal">PayPal </option>
    <option value="E-Wallet"> E-Wallet</option>
</select>
<input type="submit" value="Fertig!">
</form>
<?php } ?>
</div>

<form method="post" action="kundeProfil.php">
        <input type="hidden" name="kundeEmail" value="<?php echo $bestellung['KUNDE_EMAIL']; ?>">
        <button class="button2" type="submit"> Bestellung abbrechen </button>
 </form>
<br>
 <img src="allSanrio.jpg" height="220" width="670">

 </div>
</body>
</html>