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
        
        height: 70%;
        margin-top:-220px;
        width: 250px;
        height:260px;
        
    
        
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
        <h3>view candidate</h3>
        <?php
        include "../web-db/connection.php";
        echo "<table border='1'>";
    $query=mysqli_query($con,"select *from candidate");
    echo "<tr>"."<th>"."cid"."</th>"."<th>"."candidatenatinalid"."</th>"."<th>"."firstname"."</th>"."<th>"."lastname"."</th>"."<th>"."gender"."</th>"."<th>"."dateofbirth"."</th>"."<th>"."dateofexam"."</th>"."<th>"."phonenumber"."</th>"."<th colspan='2'>"."operation"."</th>"."</tr>";
    $i = 1;
    $check=mysqli_num_rows($query);
    if($check>=1)
    {
    while ($rows = mysqli_fetch_array($query)) {
        echo "<tr>"."<td>".$i."</td>"."<td>".$rows["cnid"]."</td>"."<td>".$rows["firstname"]."</td>"."<td>".$rows["lastname"]."</td>"."<td>".$rows["gender"]."</td>"."<td>".$rows["dob"]."</td>"."<td>".$rows["examdate"]."</td>"."</td>"."<td>".$rows["phonenumber"]."</td>"."<td>"."<button>"."<a href='updatecandidate.php ? uy=".$rows['cnid']."'>"."Update"."</a>"."</button>"."</td>"."<td>"."<button>"."<a href='deletecandidate.php ? uy=".$rows['cnid']."'>"."delete"."</a>"."</button>"."</td>"."</tr>";
        $i++;
    }
    
     }
     echo "</table>";
     ?>
       
    </div>
    <div id="footer">
        <?php include "../web-include/footer.php";?>
    </div>
    </div>
<?php
}
?>