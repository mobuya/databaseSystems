<?php
    require_once('DatabaseHelper.php');
    $kundeEmail = $_POST['kundeEmail'];

    $database = new DatabaseHelper();
    $message ='';
    $succes =  $database->deleteKunde($kundeEmail);

    if($succes){
        $message = "Schade... Aber du kannst jeder Zeit einen neuen Account machen!";
    } else {
        $message = "Oops.. irgendwas ist schief gelaufen!";
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
    <form method="post" action="index.php">
        <button class="button" type="submit"> 
           Home 
        </button>
</body>
</html>