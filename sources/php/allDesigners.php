<?php
require_once('DatabaseHelper.php');

$database = new DatabaseHelper();

$designerid = '';

$email = '';

$d_name = '';

$designer_array = $database->selectAllDesigners($designerid, $email, $d_name);
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
table {
   margin: auto;
   border-collapse: separate;
   border-spacing: 20px 15px;
}
td {
  padding: 10px; 
  width: 250px;
  padding: 5px;
  text-align: center;
}
th{
  padding: 10px; 
  width: 250px;
  padding: 5px;
  text-align: center;
  font-size: 20px;
  color : #e6005c;
}
.button1 {
   background-color: #e9cbf7; 
   color: white;
   border: none;
   padding: 8px 8px;
   font-weight: bold;
   text-transform: uppercase;
   font-size: 15px;
   border-radius: 10px;
}
.button1:hover {
  background-color: white; 
  color:  #d3a7e8;
}    



</style>
<h1 style="color:#fc95bc;text-align: center;">Designers List</h1>
</head>
<body>
  <br>

<form method="post" action="showMitarbeitDaten.php">
<center>Du kannst ihre Zusammenarbeit sehen <input type="submit" value="Hier!" class="button1"></center>
</form>
<br>

<p style="text-align:center;font-size:1em;">Klicke auf eine beliebige E-mail um eine nachricht zu senden </p>


<table>
  <tr>
    <th>Name</th>
    <th>E-Mail</th>
  </tr>
  <?php foreach($designer_array as $designer) : ?>
    <tr>
      <td> <?php echo $designer['D_NAME']; ?> </td>
      <td> <a href="designerKontakt.php?designerid=<?php echo $designer['DESIGNERID']; ?>"><?php echo $designer['EMAIL'];?></a></td>
    </tr>
  <?php endforeach; ?>
</table>
</body>
</html>