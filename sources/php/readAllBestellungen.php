<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

$alleOhrringe = $database->readAllOhhringe();
$alleHalsketten = $database->readAllHalsketten();
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
        padding: 15px; 
        width: 180px;
        padding: 5px;
        text-align: center;
    }

    th {
        width: 180px;
        padding: 15px;
        text-align: center;
        font-size: 20px;
        color :#135297;
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
    <br>
    <center><h1> Alle unsere Produkte </h1></center>
    <br>
</head>
<body>
  
<table style="float:left; margin-left: 400px;">
   <caption> Ohrringe: </caption>
  <tr>
    <th>Name</th>
    <th>Preis</th>
  </tr>
  <?php foreach($alleOhrringe as $ohrring) : ?>
    <tr>
      <td> <?php echo $ohrring['NAME']; ?> </td>
      <td><?php echo $ohrring['PREIS']; ?> €</td>
    </tr>
  <?php endforeach; ?>
</table>

<table>
   <caption> Halsketten: </caption>
  <tr>
    <th>Name</th>
    <th>Preis</th>
  </tr>
  <?php foreach($alleHalsketten as $halskette) : ?>
    <tr>
      <td> <?php echo$halskette['NAME']; ?> </td>
      <td><?php echo $halskette['PREIS']; ?>€</td>
    </tr>
  <?php endforeach; ?>
</table>

</body>
</html>