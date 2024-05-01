 <?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();
$kundeEmail ='';
$errorMessage = '';
if(isset($_POST['kundeEmail'])){
    $kundeEmail = $_POST['kundeEmail'];
}
$valid = $database->checkKunde($kundeEmail);
 if($valid) {
 } else {
    $errorMessage = "Du musst dich Registrieren bitte :)";
    header("Refresh: 3; URL=kundeAnmelden.php");
 }

 $vorname='';
 $nachname='';
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
    .content {
        margin-left: 400px;
        margin-top: 50px; 
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }
    .profile-pic {
        float: left;
        margin-right: 20px; 
        margin-bottom: 20px; 
        border: 2px solid black; 
        padding: 5px; 
        border-color: #135297;
    }
    .button {
            background-color:#aedefc;
            color: white;
            padding: 8px 18px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 15px;
            margin-left: 35px;
        }
    .button:hover{
        background-color:  white;
        color: #aedefc;
    }
    .button2 {
        background-color:#e97ea6; 
            color: white;
            padding: 6px 6px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 25px;
        }
    .button2:hover{
        background-color: white;  
        color:  #fc95bc;
    }
    .button3 {
        background-color:#fcbb77;
        color: white;
        padding: 6px 6px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 25px;
        border: none;
        font-family: 'Trebuchet MS';
        font-weight: bold;
        text-shadow: 2px 2px 4px rgba(128, 0, 128, 0.2);
        }
    .button3:hover{
        background-color:  white;
        color:  #f2c99d;
    }
</style>
</head>
<body>
<?php if (!empty($errorMessage)) : ?>
    <br>
    <h2 style="color:#e97ea6;text-align: center;"><?php echo $errorMessage; ?></h2>
    <br>
        <center><a href="kundeAnmelden.php">Zurück zur Anmeldung</a></center>
        <?php else : ?>
<p style="text-align:center;font-size: 28px;"> Hallo <?php echo $kunde['VORNAME']; ?>!</p>            
    <div class="content">
<img src="sanrioPorfilePic.jpg" class="profile-pic" height="150" width="150">
<div>
<h1 style="font-size: 25px;"> Vorname: <?php echo $kunde['VORNAME']; ?> </h1>
<h1 style="font-size: 25px;"> Nachname: <?php echo $kunde['NACHNAME']; ?> </h1>
<h1 style="font-size: 25px;"> Email: <?php echo $kundeEmail; ?> </h1>
        </div>
<a href="updateKunde.php?kundeEmail=<?php echo $kundeEmail; ?>" class="button">Account Verwalten</a> <br> 
<a href="index.php" class="button">Abmelden</a>
    </div>
    <br>
   <br>  
   <center><img src="boxOrder.jpg" height="100" width="100" ></center>  
    <br>
    <form method="post" action="createBestellung.php">
    <input type="hidden" name="kundeEmail"value="<?php echo $kundeEmail; ?>">
    <center><button type="submit" class="button3">Neue Bestellung</button></center>
    </form>
    
    <br> 
    <br>
   <center> <a href="kundeBestellungen.php?kundeEmail=<?php echo $kundeEmail; ?>" class="button2">Meine Bestellungen</a></center>
   <?php endif; ?>

</body>

</html>     