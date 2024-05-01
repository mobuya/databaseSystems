<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

$kundeEmail ='';
if(isset($_POST['kundeEmail'])){
    $kundeEmail = $_POST['kundeEmail'];
}

$neuerNachname ='';
if(isset($_POST['neuerNachname'])){
    $neuerNachname = $_POST['neuerNachname'];
}

$success = @ $database ->updateKundeNachname($kundeEmail, $neuerNachname);

$message ='';

if($success) {
    $message = "Änderungen erfolgreich gespeichert!";
} else {
    $message = "Ooops... Nachname darf nicht leer sein!";
}
?>
<html>
<head>
<style>
body {
        font-family: 'Trebuchet MS';
        font-weight: bold;
        background: linear-gradient(0deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7)), url('BackgroundIndex.jpg');
        text-shadow: 2px 2px 4px rgba(128, 0, 128, 0.2);
    }
    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 25vh;
        text-align: center;
    }
    .button {
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
        .button:hover {
            background-color: white;
            color: #fc95bc;
        }
</style>
</head>
<body>
<br>
<br>
<div class="container">
    <h2 style="color:#f385a0;text-align: center;"><?php echo $message; ?></h2>
    <br>
    <form method="post" action="kundeProfil.php">
        <input type="hidden" name="kundeEmail" value="<?php echo $kundeEmail; ?>">
        <button class="button" type="submit"> 
           Zurück 
        </button>
</form>
 </div>
</body>
</html>