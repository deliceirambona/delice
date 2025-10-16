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
    <center><h3>reset password</h3>
        <form method="POST" action="resetpass.php">
    <center><table border="0">
      <tr><td>Username:</td><td><input type="text" name="username" required></td></tr>
      <tr><td>Current Password:</td><td><input type="password" name="current_password" required></td></tr>
      <tr><td>New Password:</td><td><input type="password" name="new_password" required></td></tr>
      <tr><td></td><td><input type="submit" name="resetbtn" value="Reset Password"></td></tr>
    </table></center>
  </form>

<?php
if (isset($_POST["resetbtn"])) {
    $username = $_POST["username"];
    $current_password = $_POST["current_password"];
    $new_password = $_POST["new_password"];

    include "../web-db/connection.php";

    // Check if current username and password match
    $check = mysqli_query($con, "SELECT * FROM user WHERE username ='$username' AND password ='$current_password'");
    
    if (mysqli_num_rows($check) == 1) {
        // Update password
        $update = mysqli_query($con, "UPDATE user SET password='$new_password' WHERE username='$username'");

        if ($update) {
          session_destroy();
            echo "<p>Password updated successfully!</p>";
            header("refresh:2;url=../index.php");
        } else {
            echo "<p>Error updating password.</p>";
        }
    } else {
        echo "<p>Username or current password is incorrect.</p>";
         header("refresh:2;");
    }
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