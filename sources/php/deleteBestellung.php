<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

$bestellungNr = $_POST['bestellungsNr'];
$kundeEmail = $_POST['kundeEmail'];


$message = '';
$success = $database->deleteBestellung($bestellungNr);
if($success) {
    $message = "Wenn du deine meinung änderst kahnnst du jeder Zeit nocheinmal bestellen!";
} else {
    echo "ERROR";
}



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
.button1 {
    font-size: 14px;
    padding: 10px 20px;
    color: white;
    border: none;
    text-transform: uppercase;
    margin-left: 15px;
    font-family: 'Trebuchet MS';
    border-radius: 25px;
    cursor: pointer;
    text-shadow: 2px 2px 4px rgba(128, 0, 128, 0.2);
        font-weight: bold;
    background-color:#fc95bc;
    }
.button1:hover {
    background-color: white;
    color: #fc95bc;
    }
.form-container {
    margin-top: 150px;
    align-items: center;
    justify-content: center;
     margin-bottom: 10px;
    display: flex;
    text-align: center;
    flex-direction: column;
    }

</style>
</head>
<body>
<div class="form-container">
<h1> Du kannst jederzeit etwas neues bestellen! </h1>
<form method="post" action="kundeProfil.php">
        <input type="hidden" name="kundeEmail" value="<?php echo $kundeEmail; ?>">
        <button class="button1" type="submit"> Zurück </button>
</form>
</div>

</body>
</html>

      