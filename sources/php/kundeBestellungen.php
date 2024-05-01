<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

$kundeEmail = $_GET['kundeEmail'];

$bestellungId = '';

$preis ='';

$kundeBestellungen = $database->selectKundeBestellung($kundeEmail);
$kunde = $database->getKundeInfo($kundeEmail);
$database->cancelBestellung();

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
    
    table {
    margin: auto;
    border-collapse: separate;
    border-spacing: 20px 15px;
    }

    td {
    padding: 10px; 
    width: 250px;
    padding: 5px;
    text-align: center;
    }

    th {
    padding: 10px; 
    width: 250px;
    padding: 5px;
    text-align: center;
    font-size: 20px;
    color : #e6005c;
    }
</style>
<br>

<center><h2> <?php echo $kunde['VORNAME']; ?>, hier kannst du deine bestellungen verwalten </h2></center>
<center><h3> Klicke auf die Bestellungs-ID</h3>
</head>
<body>

<table>
    <tr>
    <th>Bestellungs-ID</th>
    <th> Preis </th>
    </tr>
    <?php foreach($kundeBestellungen as $bestellung) : ?>
        <tr>
            <td> <a href="bestellungInfo.php?bestellungsNummer=<?php echo $bestellung['BESTELLUNGSNUMMER']; ?>"><?php echo $bestellung['BESTELLUNGSNUMMER']; ?></a> </td>
            <td> <?php echo $bestellung['GESAMTPREIS']; ?> €</td>
    </tr>
    <?php endforeach; ?> 

    </table>
                                                                                                  
</body>
</html>  