<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

$kundeEmail = $_POST['kundeEmail'];

$bestellungsNr = $database->insertIntoBestellung($kundeEmail);
$bestellung = $database->getBestellungInfo($bestellungsNr);

$dID = '';
$email = '';
$d_name = '';
$designerId = '';

$designer_array = $database->selectAllDesigners($dID, $email, $d_name);
$assistent_array = $database->selectAllAssistents();

$selectedDesignerID = '';
$selectedAssistentID = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['designerId'])) {
    $selectedDesignerID = $_POST['designerId'];
    $selectedDesignerName = $database->getDesignerInfo($selectedDesignerID);
   }
   if (isset($_POST['assistentId'])) {
    $selectedAssistentID = $_POST['assistentId'];
    $selectedAssistentName = $database->getAssistentInfo($selectedAssistentID);
    }   
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
    .content {
            margin-top: 40px;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            display: flex; 
            flex-direction: column; 
            align-items: center; 
        }
    select {
            margin-bottom: 10px;
            margin-right: 50px;
    }
    .button {
            font-size: 15px; 
            padding: 7px 7px; 
            background-color: #f385a0;
            color: white;
            text-transform: uppercase;
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
    
    .description {
        text-align: center;
        font-size: 18px;
        color: #f385a0;
        margin-bottom: 20px;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }
    
    </style>
    <br>
    <h1 style="margin-left: 30px";>Step 1/4</h1>
    <center><h1> Wähle wer deine Bestellung kreiren soll: </h1></center>
    </head>
<body>
    <div class="content">
    <form method="post" action="insertKreirenBestellung.php">
        <label for="designer"> Designer:</label>
        <select name="designerId" id="designer">
        <?php foreach($designer_array as $designer) : ?> 
            <option value="<?php echo $designer['DESIGNERID']; ?>"><?php echo $designer['D_NAME']; ?> </option>
        <?php endforeach; ?>
        </select>
       
<label for="assistent"> Assistent: </label>
<select name="assistentId" id="assistent">
<?php foreach($assistent_array as $assistent) : ?>
    <option value="<?php echo $assistent['ASSISTENTID'];?>"><?php echo $assistent['A_NAME']; ?> </option>
    <?php endforeach; ?>
</select>    
<input type="hidden" name="bestellungsNr" value="<?php echo $bestellungsNr; ?>">
        <button type="submit" class="button"> WEITER </button>
        </form>
        </div>
        <br>
<center><h3> Du kannst dich nicht entscheiden? Unsere Empfehlung:</h3></center>

<center><h2> Hello Kitty & Purin The Dog</h2></center>
<div class="description" >
Hello Kitty und Purin the Dog sind ein unschlagbares Team, wenn es um die Schmuckherstellung geht.
Mit ihrer gemeinsamen Kreativität und ihrem Talent bringen sie einzigartige Designs hervor, die Herzen auf der ganzen Welt erobern. 
Ihre Zusammenarbeit ist nahtlos und sie ergänzen sich perfekt, um charmante und stilvolle Schmuckstücke zu kreieren.
</div>
<br>
<br> 
<br>
<center><img src="hello_kitty.jpg" height="100" width="150"><img src="purin.jpg" height="100" width="150"></center>
</body>
</html> 