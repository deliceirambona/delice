<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="dropdown">
    <button class="dropbtn">candidate</button>
    <div class="dropdown_content">
    <a href="newcandidate.php">new candidate</a>
    <a href="viewcandidate.php">view candidate</a>
</div></div>
<div class="dropdown">
<button class="dropbtn">grade</button>
    <div class="dropdown_content">
    <a href="newgrade.php">new grade</a>
    <a href="viewgrade.php">view grade</a>
</div></div>
<div class="dropdown">
<button class="dropbtn">accaunt</button>
    <div class="dropdown_content">
    <a href="resetpass.php">reset pass</a>
    
</div></div>
<div class="dropdown">
<form method="post">
<button class="dropbtn" name="log">logout</button>
</form>
<?php
if(isset($_POST["log"])){
    session_destroy();
header("location:../index.php");
 }
?>		
</div>
</body>
</html>