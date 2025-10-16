<?php session_start();
 if(!isset($_SESSION["pass"])) {
header("location:../index.php");
}
else
{
    include "../web-db/connection.php";
    if (isset($_GET['uy'])) {
        $id= $_GET['uy'];
        $query = mysqli_query($con, "SELECT * FROM candidate WHERE cnid='$id'");
        
        if (mysqli_num_rows($query)) {
            $row = mysqli_fetch_array($query);
        
        if (isset($_POST['update'])) {
            $fname = $_POST['name'];
            $lname = $_POST['lname'];
            $gender = $_POST['gender'];
            $dob = $_POST['dateb'];
            $examdate = $_POST['exam'];
            $phone = $_POST['phone'];
        
            $update="UPDATE `candidate` SET `firstname`='$fname',`lastname`='$lname',`gender`='$gender',`dob`='$dob',`examdate`='$examdate',`phonenumber`='$phone' WHERE cnid='$id'";
    if(mysqli_query($con,$update)){
        header("location:viewcandidate.php");
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
        <h1>updatecandidate</h1>
         <form method="POST">
        First Name: <input type="text" name="name" value="<?php echo $row['firstname']; ?>"><br><br>
        Last Name: <input type="text" name="lname" value="<?php echo $row['lastname']; ?>"><br><br>
        Gender: 
        <select name="gender">
            <option value="Male" <?php if ($row['gender'] == 'Male') echo "selected"; ?>>Male</option>
            <option value="Female" <?php if ($row['gender'] == 'Female') echo "selected"; ?>>Female</option>
        </select><br><br>
        Date of Birth: <input type="date" name="dateb" value="<?php echo $row['dob']; ?>"><br><br>
        Exam Date: <input type="date" name="exam" value="<?php echo $row['examdate']; ?>"><br><br>
        Phone: <input type="text" name="phone" value="<?php echo $row['phonenumber']; ?>"><br><br>
        <input type="submit" name="update" value="Update Candidate">
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