<?php session_start();
 if(!isset($_SESSION["pass"])) {
header("location:../index.php");
}
else
{
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img{
        
        
        margin-top:-200px;
        width: 250px;
        height:240px;
    
        
    
        
        }
        h1{
            margin-left: 800px;
            margin-top:-40opx;
            font-size: 40px
        }
        h2{
            margin-left: 600px;
            margin-top:-40opx;
            font-size: 40px
        }
    </style>
   <link rel="stylesheet" type="text/css" href="../web-css/style4.css"> 
</head>
<body>
    <div id="layout">
    <div id="banner"><h1>RDL</h1>
    <h2>RWANDA DRIVING LICENSE</h2>
    <marquee>RWANDA DRIVING LICENSE</marquee>
       <img src="../web-image/p.png"  >
       
    </div>
    <div id="menu">
    <?php include "../web-menu/menu.php"; ?>
    </div>
    <div id="content">
    
    </div>
    <div id="footer">
        <?php include "../web-include/footer.php";?>
    </div>
    </div>


</body>
</html>

<?php
}
?>