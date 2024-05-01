<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();
$designerid = $_GET['designerid'];
$designer = $database->getDesignerInfo($designerid);
$errorMessage="";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $kundeEmail = $_POST['kundeEmail'];
    $message = $_POST['message'];

    $validEmail = @ $database->checkKunde($kundeEmail);
   
    if($validEmail) {
        $success = @ $database->insertIntoHabenKontakt($designerid, $kundeEmail);
       if($success){ 
        echo "Ihre Nachricht wurde erfolgreich gesendet! :)";
        header("Refresh: 3; URL=index.php");
       } else {
        $errorMessage= "Du hast schon eine nachricht geschikt. Bitte warte um eine Antwort zu bekommen";
       header("Refresh: 3; URL=index.php");
       }
        
    } else {
       $errorMessage= "Hmmm... Registrieren Sie sich bitte um eine Nachricht zu schicken.";
       header("Refresh: 3; URL=index.php");
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <style>
    body {
        font-family: 'Trebuchet MS';
        text-shadow: 2px 2px 4px rgba(128, 0, 128, 0.2);
        background: linear-gradient(0deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7)), url('BackgroundIndex.jpg');
        }
        .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 50vh;
        text-align: center;
    }
    .input-text {
        font-size: 15px;
        font-family: 'Trebuchet MS';
        margin-bottom: 10px;
    }
    .input-textarea {
        font-family: 'Trebuchet MS';
        font-size: 15px;
        resize: vertical;
        height: 100px;
        width: 300px;
        margin-bottom: 10px;
    }
    .input-label {
        font-size: 20px;
        margin-bottom: 10px;
        margin-top: 10px;
    }
    input[type="submit"] {
        font-size: 15px; 
        padding: 10px 20px;
        background-color: #e97ea6;
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
        color:#e97ea6;
        background-color: white;
    } 
    .button5 {
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
        .button5:hover {
            background-color: white;
            color: #fc95bc;
        }
  
    </style>
</head>
<body>
<?php if (!empty($errorMessage)) : ?>
    <div class="container">
   <h1 style="color:  #fc95bc;"> <?php echo $errorMessage; ?> </h1>
    <form method="post" action="kundeAnmelden.php">
        <button class="button5" type="submit"> 
           Registrieren 
        </button>
    </div> 
        <?php else : ?>
            <div class="container">
<br>
    <h1 style="color:#e97ea6;text-align: center;">Kontaktieren sie <?php echo $designer['D_NAME']; ?></h1>
<br> 
<form method="POST">
    <label for="kundeEmail" class="input-label"> Deine E-Mail Addresse:</label>
    <input type="email" id="kundeEmail" name="kundeEmail"class="input-text" required> <br><br>

    <label for="nachricht" class="input-label">Deine Nachricht:</label> <br><br>
    <textarea id="message" name="message"class="input-textarea"required></textarea><br>
        <br>
    <input type="submit" value="Jetzt senden!">
    </form>
        </div>
    <br>
    <br>
    <center><img src="magic-mail.gif" height="300" width="300"></center>
    <?php endif; ?>

    </body>
</html>