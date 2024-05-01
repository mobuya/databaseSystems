<?php 

require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

$email = '';
if (isset($_POST['email'])) {
    $email = $_POST['email'];
}

$vorname = '';
if (isset($_POST['vorname'])) {
    $vorname = $_POST['vorname'];
}

$nachname = '';
if (isset($_POST['nachname'])) {
    $nachname = $_POST['nachname'];
}
$message ='';

$validEmail = $database->checkKunde($email);
if($validEmail) {
   $message = "Du hast schon einen Account; gib deine E-Mail adresse in ANMELDUNG rein :)";
} else {

    $success = $database->insertIntoKunde($email, $vorname, $nachname);

    if($success) {
        $message= "Du hast dich erlolfgreich registriert, jetzt kannst du dich anmelden!";
    } else {
        $message = "Es schein ein Problem zu geben, bist du sicher dass dich nicht mit dieser Emial schon registriert hast?";
    }
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
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 50vh;
            text-align: center;
    }
    </style>
</head>
<body>
<div class="container">
<br>
<h2 style="color:#e97ea6;text-align: center;"><?php echo $message; ?></h2>
<br>
<a href="kundeAnmelden.php">
    Zurück zur Anmeldung
</a>
</div>
</body>
</html>