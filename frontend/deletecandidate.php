<?php session_start();
 if(!isset($_SESSION["pass"])) {
header("location:../index.php");
}
else
$id=$_GET["uy"];
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
        margin-top:-300px;
        width: 250px;
        height:200px;
        
    
        
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
   <link rel="stylesheet" type="text/css" href="../web-css/style2.css"> 
</head>
<body>
    <div id="layout">
    <div id="banner"><h1>RDL</h1>
    <h2>RWANDA DRIVING LICENSE</h2>
    <marquee>RWANDA DRIVING LICENSE</marquee>
       <img src="../web-image/po.jpg"  >
       
    </div>
    <div id="menu">
    <?php include "../web-menu/menu.php"; ?>
    </div>
    <div id="content">
        <h3>deletecandidate</h3>
        <?php
		include "../web-db/connection.php";
		$query=mysqli_query($con,"select*from candidate where cnid='$id'");
		$check=mysqli_num_rows($query);
		if($check==1)
		{
			while($row=mysqli_fetch_array($query))
			{
		?>
        
		<form method="POST" action="">
			<table bgcolor="bluesky">
				<tr><td>do you relly want to delete </td></tr>
				<tr><td><input type="text" name="updtext" value="<?php echo $row['firstname'];?>">
					<input type="hidden" name="uid" value="<?php echo $id;?>"></td></tr>
					<tr><td><input type="submit" name="yesbtn" value="yes">
					<input type="submit" name="nobtn" value="no"></td></tr>
				</table></form>
					<?php
				}
		}
			?>

			<?php
			if(isset($_POST['yesbtn'])){
				$upid=$_POST['uid'];
				include "../web-db/connection.php";
				$querydel=mysqli_query($con,"delete from candidate  where  cnid='$upid'");
				if($querydel){
					header("location:viewcandidate.php");
				}
			}
			elseif (isset($_POST['nobtn'])) {
				header("location:viewcandidate.php");
			}
			?>
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