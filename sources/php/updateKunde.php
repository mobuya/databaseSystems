<?php
require_once('DatabaseHelper.php');
$kundeEmail = $kundeEmail = $_GET['kundeEmail'];



$neuerVorname='';
if(isset($_POST['neuerVorname'])){
    $neuerVorname = $_POST['neuerVorname'];
}

$neuerNachname ='';
if(isset($_POST['neuerNachname'])){
    $neuerNachname = $_POST['neuerNachname'];
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
    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 80vh;
        text-align: center;
}
    .input-text {
        font-size: 15px;
        font-family: 'Trebuchet MS';
        margin-bottom: 10px;
        width: 200px;
    }
    .input-label {
        font-size: 90px;
        margin-bottom: 10px;
        margin-top: 10px;
        display: inline;
        
    }
    .button {
            font-size: 15px; 
            padding: 6px 6px;
            background-color: #f385a0;
            color: white;
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
</style>
</head>
<br>
<br>
<div class="container">
    
<body>
    <form method="post" action="changeVorname.php">
    <input type="hidden" name="kundeEmail" value="<?php echo $kundeEmail; ?>">
    <label for="neuerVorname" style="font-size: 25px;">Neuer Vorname:</label>
    <input id="neuerVorname" name="neuerVorname" class="input-text" type="text" maxlength="50" style="display: inline;">
    <button class="button" type="submit">
       Vorname ändern
    </button>
    <br>
    <br>
    <br>
    <br>
    </form>
    <form method="post" action="changeNachname.php">
    <input type="hidden" name="kundeEmail" value="<?php echo $kundeEmail; ?>">
    <label for="neuerNachname"style="font-size: 25px;">Neuer Nachname:</label>
    <input id="neuerNachname" name="neuerNachname" class="input-text" type="text" maxlength="50" style="display: inline;">
    <button class="button" type="submit">
        Nachname ändern
    </button>
    <br>
    <br>
    <br>
    <br>
    </form>
    <form method="post" action="deleteKunde.php">
        <input type="hidden" name="kundeEmail" value="<?php echo $kundeEmail; ?>">
        <button class="button" type="submit"> 
            Account Löschen 
        </button>
</form>
    <br>
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
  