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
        <h3>new grade</h3>
        <form method="POST">
			<table bgcolor="violet">
				<tr><td>candidate title<select name="slpost"><option value="">select candidate name</option>
					<?php
					include "../web-db/connection.php";
					$query=mysqli_query($con,"select* from candidate");
					while($row=mysqli_fetch_array($query)){

					?>
					<option><?php echo $row["firstname"];?></option>
					<?php
				}
				?>
			</select><input type="submit" name="checkbtn" value="check"></td></tr>
				
			</table></form>
			<?php
		if (isset($_POST["checkbtn"])) {
			$slvalue=$_POST["slpost"];
			include "../web-db/connection.php";
			$queryval=mysqli_query($con,"select *from candidate where firstname='$slvalue'");
			$check=mysqli_num_rows($queryval);
			if ($check==1) {
					while ($rowvalue=mysqli_fetch_array($queryval)) {
						?>

					<form method="POST" name="myform">
						<table bgcolor="green">
							<tr><td>firstname</td><td><input type=""name="c"value="<?php echo $rowvalue['firstname'];?>"readonly>
							<tr><td>lastname</td><td><input type=""name="d"value="<?php echo $rowvalue['lastname'];?>"readonly>
                               <input type="hidden" name="pfk" value="<?php echo $rowvalue['cnid'];?>"></td></tr>
                                <tr><td>license exam category</td><td><input type="text"name="lxc"></td></tr>
                                <tr><td>obtained marks<td><input type=""name="m"></td></td></tr>
                                <tr><td>decision</td><td><input type="radio"name="competence" value ="competence">competence<input type="radio" name="competence"value="notyetcompetence">notyetcompetence</td></tr>
                                <tr><td></td><td><input type="submit" name="savebtn" value="save" ></td></tr>
							</table>
 						</form>
							
						

					<?php
				}
					

				
            }
 
 }


			?>
 			<?php
			if(isset($_POST["savebtn"])){
				$ci=$_POST['c'];
				$cia=$_POST['d'];
 				$pid=$_POST['pfk'];
                 $d=$_POST['lxc'];
 				$naid=$_POST['m'];
 				$fname=$_POST['competence'];
                
 				include "../web-db/connection.php";
 				$querycheck=mysqli_query($con,"select candidate.cnid,candidate.firstname,candidate.lastname,grade.cnid,grade.lxc,grade.marks,grade.decision from candidate inner join grade on candidate.cnid=grade.cnid  where grade.cnid='$pid' and candidate.cnid='$ci'");
			$check=mysqli_num_rows($querycheck);

  				if($check==1){
  					while($row=mysqli_fetch_array($querycheck)){
  						echo "please candidate is already registered";
  						header("refresh:2;");

  }

  }

  else{
 	$queryinsert=mysqli_query($con,"insert into grade values('','$pid','$d','$naid','$fname')");
 	if($queryinsert){
		echo "candidate registered successfully";
		header("refresh:2;");

 }else{
     echo "not inserted";
     header("refresh:2;");
 }

 
         }}
//  	?>

    </div>
    <div id="footer">
        <?php include "../web-include/footer.php";?>
    </div>
    </div>
<?php
}
?>