<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

$bestellungsNummer = $_GET['bestellungsNummer'];

$bestellung = $database->getBestellungInfo($bestellungsNummer);

$alleOhhriing = $database->showBestellungOhrring($bestellungsNummer);
$alleHalskette = $database->showBestellungHalskette($bestellungsNummer);

if(empty($alleOhhriing) && empty($alleHalskette)){
    $database->deleteBestellung($bestellungsNummer);
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

    td {
        padding: 5px; 
        width: 120px;
        padding: 5px;
        text-align: center;
    }

    th {
        width: 120px;
        padding: 10px;
        text-align: center;
        font-size: 20px;
        color :#135297;
    }
    .button {
            font-size: 10px;
            text-transform: uppercase;
            padding: 6px 9px;
            background-color: #ff66b3;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            opacity: 0.7;
            margin-left: 5px;
        }
        .button:hover {
            background-color: white;
            color: #ff99cc;
        }
        .button2 { 
            display: flex;
            font-size: 14px;
            font-weight: bold;
            padding: 8px 8px;
            text-transform: uppercase;
            text-shadow: 2px 2px 4px rgba(128, 0, 128, 0.2);
            background-color: #ff5050;
            color: white;
            border: none;
            opacity: 0.7;
            border-radius: 15px;
            cursor: pointer;
            margin-right: 40px;
            margin-top: 100px;
        }
        .button2:hover {
            background-color:white;
            color: #cc0000;
        }
        .button3 {
            display: flex;
            font-size: 14px;
            padding: 8px 8px;
            text-transform: uppercase;
            text-shadow: 2px 2px 4px rgba(128, 0, 128, 0.2);
            font-weight: bold;
            border-radius: 15px;
            background-color: #aedefc;
            color: white;
            border: none;
            cursor: pointer;
            margin-right: 40px;
            margin-top: 100px;
           
        }
        .button3:hover {
            background-color:  white;
            color: #aedefc; 
        }
    caption { 
        font-size: 24px;
        font-weight: bold;
        color: #e6005c;
        margin-bottom: 10px;
    }
    .form-container {
        display: flex;
        margin-top: 50px;
        text-align: center;
        flex-direction: column;
        }
</style>
<center><h2 style="color: #ff5050;">Deine Bestellung mir der ID: <?php echo $bestellungsNummer; ?> </h2><center>
</head>
<br>
<br>
<body>
    <div>
   <table style="float:left; margin-left: 360px;">
 
   <caption> Ohrringe: </caption>
   <tr>
   <th> ID </th>
   <th>Name</th>
   <th>Preis</th>
    </tr>
    <?php foreach($alleOhhriing as $ohrring) :?>
        <form method="post" action="deleteOhrring.php">
        <tr>
            <td> <?php echo $ohrring['PRODUKTID']; ?> </td>
            <td> <?php echo $ohrring['NAME']; ?> </td>
            <td><?php echo $ohrring['PREIS']; ?>€ 
        <input type="hidden" name="produktID" value="<?php echo $ohrring['PRODUKTID']; ?>">
        <input type="hidden" name="bestellungsNr" value="<?php echo $bestellungsNummer; ?>">
        <button type="submit" class="button">X</button> </td>
    </form>
    </tr>
    <?php endforeach; ?>
   </table>
   <table style="float: left;">
 
   <caption> Halsketten: </caption>
   <tr>

    <th>Name</th>
    <th>Größe</th>
    <th>Preis</th>
   </tr>
    <?php foreach($alleHalskette as $halskette) : ?>
        <form method="post" action="deleteHalskette.php">
    <tr>
       
        <td> <?php echo $halskette['NAME']; ?> </td>
        <td> <?php echo $halskette['GROESSE']; ?> </td>
        <td> <?php echo $halskette['PREIS']; ?> 
        <input type="hidden" name="produktID" value="<?php echo $halskette['PRODUKTID']; ?>">
        <input type="hidden" name="bestellungsNr" value="<?php echo $bestellungsNummer; ?>">
        <button type="submit"class="button">X</button> </td>
    </form>
    </tr>
    <?php endforeach; ?>
   </table>
   </div>
<div class="form-container">
    <br>
<form method="post" action="createOhrringPaar.php">
Wähle welche Ohrringe als Paar verpackt werden sollen:
<br>
<input type="hidden" name="bestellungsNr" value="<?php echo $bestellungsNummer; ?>">
<br>
<label for="pid1">Ohrring 1:</label>
<input id="pid1" name="pid1" class="input-text" type="number" maxlength="15" required> <br> <br>

<label for="pid2">Ohrring 2:</label>
<input id="pid2" name="pid2" class="input-text" type="number" maxlength="15" required> <br><br> 
<button type="submit" class="button" style="font-size: 15px;">Paar</button> 
</form>
</div>

<form method="post" action="deleteBestellung.php">
<input type="hidden" name="bestellungsNr" value="<?php echo $bestellungsNummer;?>">
<input type="hidden" name="kundeEmail" value="<?php echo $bestellung['KUNDE_EMAIL'];?>">
<button type="submit" class="button2">Bestellung Stornieren</button> 
</form>

<form method="post" action="kundeProfil.php">
        <input type="hidden" name="kundeEmail" value="<?php echo $bestellung['KUNDE_EMAIL']; ?>">
        <button class="button3" type="submit"> Zurück </button>
</form>

</body>
</html>   