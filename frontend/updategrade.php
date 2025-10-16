<?php session_start();
 if(!isset($_SESSION["pass"])) {
header("location:../index.php");
}
else
{
    include "../web-db/connection.php";
    if (isset($_GET['up'])) {
        $id= $_GET['up'];
        $query = mysqli_query($con, "SELECT * FROM grade WHERE cnid='$id'");
        
        if (mysqli_num_rows($query)) {
            $row = mysqli_fetch_array($query);
        
    
    if (isset($_POST['update'])) {
        $gender = $_POST['gender'];
        $c = $_POST['lxc'];
        $marks = $_POST['marks'];
        $decision = $_POST['decision'];
    
        $update="UPDATE `grade` SET `lxc`='$c',`marks`='$marks',`decision`='$decision' WHERE cnid='$id'";
if(mysqli_query($con,$update)){
    header("location:viewgrade.php");
} else {
    echo "Error updating record.";
}
    }

        }}
?>
    
     <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img{
        
        
        margin-top:-220px;
        width: 250px;
        height:240px;
        margin-top:-190px;
        
    
        
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
        <h3>update grade</h3>
        <form method="POST">
        license category: <input type="text" name="lxc" value="<?php echo $row['lxc']; ?>"><br><br>
        marks: <input type="text" name="marks" value="<?php echo $row['marks']; ?>"><br><br>
        decision: <input type="text" name="decision" value="<?php echo $row['decision']; ?>"><br><br>
        <input type="submit" name="update" value="Update grade">
    </form>
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