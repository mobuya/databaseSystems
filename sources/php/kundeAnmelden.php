<?php

require_once('DatabaseHelper.php');
$database = new DatabaseHelper();
$email='';
$vorname='';
$nachname='';

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
    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 25vh;
        text-align: center;
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
    input[type="submit"]:hover {
        background-color: white;
        color: #fc95bc; 
    } 
    </style>
    <p style="text-align:center;"><img src="piinkLogo.jpg" alt="goe"height="100" width="470"> </p>
</head>

<body>
</form>
        <div class="container">
        <p style="text-align:center;"> Hier kannst du dich mit deiner Registration-Email anmelden:</p>
        <form method="post" action="kundeProfil.php">
            <label for="kundeEmail" class="input-label">E-Mail: </label> <input type="email" id="kundeEmail" name="kundeEmail" class="input-text"required>
            <br>
            <input type="submit" value="Anmelden">
        </div>
        </form>
<center><img src="napomena.jpg" height="100" width="100"></center>
    <p style="text-align:center;"> Du musst dich zuerst Registrien, damit du etwas bestellen kannst:</p>
  <div class="container">
        <form  method="post" action="insertKunde.php">
            <div>
                <label for="vorname">Vorname:</label>
                <input id="vorname" name="vorname" class="input-text" type="text" maxlength="50" required><br><br>
            
                <label for="nachname">Nachname:</label>
                <input id="nachname" name="nachname" class="input-text" type="text" maxlength="50" required><br><br>
            
                <label for="email">E-Mail:</label>
                <input id="email" name="email" type="email" class="input-text" maxlength="50" required><br><br>
           
            
            <input type="submit" value="Registrieren">
            </div>
            
</div>

    

</body>
</html>
