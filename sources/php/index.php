
<!DOCTYPE html>
<html>
<head>
<style>

.button {
    border: none;
    color: white;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
    text-transform: uppercase;
    font-family: 'Trebuchet MS';
    transition-duration: 0.4s;
    cursor: pointer;
}
.button1 { 
  padding: 7px 7px;
  background-color:#fcbb77;
  color: white; 
  border-radius: 20px;   
}

.button1:hover {
  background-color:  white;
  color:  #f2c99d;
}

.button2 { 
  padding: 10px 20px;
   display: flex;
   margin: 0 auto;
   padding: 7px 7px;
   margin-top: 45px;
   background-color:#e97ea6; 
   color: white;  
   font-size: 25px;  
   border-radius: 30px; 
}
.button2:hover {
  background-color: white;  
  color:  #fc95bc;
}    

body {
  font-family: 'Trebuchet MS';
  font-style: bold;
  background: linear-gradient(0deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7)), url('BackgroundIndex.jpg');

}
h1 {
  color: maroon;
  margin-left: 40px;
}
.text-with-button {
     display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
}
.text {
    margin-right: 15px;
}
</style> 
<p style="text-align:center;"><img src="piinkLogo.jpg" alt="goe"height="100" width="470"></p> 
</head> 
<body>
<h1 style="color:#f385a0;text-align:center;">WILLKOMMEN ZU UNSEREM ONLINE JUWELIER LADEN</h1>
<p style="text-align:center;font-size:1.1em;">Dies ist der Ort, an dem Ihre kreativen Ideen Realitaet werden! </p>
<p style="text-align:center;font-size:1.1em;">Unsere Designer arbeiten hart daran, Ihnen bei der Verwirklichung all Ihrer stilvollen Look-Ideen zu helfen. </p>
<div>
<form action="kundeAnmelden.php" method="post">
  <button class="button button2"type="submit">Hier Bestellen/Registrieren!</button>
</form>
</div>
<br>
<div class="text-with-button">
    <p class="text">Lernen sie unsere Designer kennen:</p>
       <form action="allDesigners.php" method="post">
        <button class="button button1" type="submit">Designers</button>
</form>
   </div>
<br>
<div class="text-with-button">
<form method="post" action="readAllBestellungen.php">
<button class="button button1" type="submit">Unsere Kreationen</button>
</form>  
</div>
<div>
<p style="text-align:center;"><img src="newPic.jpg" alt="design"height="230" width="470"></p> 
</div>

</body>
</html>