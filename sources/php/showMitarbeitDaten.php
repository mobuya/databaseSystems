<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();
$mitarbeitDaten = $database->showView();

?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
  font-family: 'Trebuchet MS';
  background: linear-gradient(0deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7)), url('BackgroundIndex.jpg');
  text-shadow: 2px 2px 4px rgba(128, 0, 128, 0.2);
}
.container{
    margin-top: 50px;
    align-items: center;
    justify-content: center;
     margin-bottom: 10px;
    display: flex;
    text-align: center;
    flex-direction: column;
}
</style>
<br>
<br>
<center><h2> Zusammenarbeit von Designer und Assistenten</h2></center>
</head>
<body>
    <div class="container">
<?php foreach($mitarbeitDaten as $row) {
    $designerName = $row['DESIGNERNAME'];
    $assistentName = $row['ASSISTENTNAME'];
    $anzahlOhrringe = $row['ANZAHLOHRRINGE'];
    $anzahlHalsketten = $row['ANZAHLHALSKETTEN'];

    echo "Designer: " . $designerName . "<br>";
    echo "Assistent: " . $assistentName . "<br>";
    echo "Anzahl Ohrringe: " . $anzahlOhrringe . "  & ";
    echo "Halsketten: " . $anzahlHalsketten . "<br>";
    echo "<br>";

} ?>
</div>
</body>
</html>