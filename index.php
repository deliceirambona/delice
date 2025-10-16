<?php session_start();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            background-color: transparent;
            height:300px;
            margin-top: 10px;
            border-radius: 50px;
           
        }
        body{
            background-color:forestgreen;
            
        }
        #a{
            font-size: 200%;
        }
        #b{
            font-size: 200%;
        }
        #c{
            
            height: 60%;
        }
        .x{
            font-size: 200%;
            margin-right: 50%;
        }
        input[type="text"],
        input[type="password"],
        
        textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }
        h1{
            margin-top: 100px;
            font-family: new roman;
            font-size: 400%;
        }
        

            

        
    </style>
    
</head>
<body align="center" bgcolor="">
    <h1>login form</h1>
    <form method="post"name="myform" onsubmit= "return formvalidate()">
        <table border="0" align="center">
            <tr><td id="a">username</td><td id="c"><input type="text" name="fn"height=60p% ></td></tr>
            <tr><td id="b">password</tdi><td><input type="password" name="pa"></td></td></tr>
            <tr><td></td><td><button type="submit" name="loginbtn"value="login"class="x">login</button></td></tr>
        
    </form>
    </table>
    <?php
    if(isset($_POST['loginbtn'])){
        $a=$_POST['fn'];
        $b=$_POST['pa'];
        include './web-db/connection.php';
        $query=mysqli_query($con,"select* from user where username='$a' and password='$b'");
         $check=mysqli_num_rows($query);
        if($check==1){
            while($row=mysqli_fetch_array($query)){
                $_SESSION["pass"]=$row["password"];
                header("location:./frontend/home.php");
            }
        }
         else{
             echo "<h1>"."failed"."<h1>";
             header("refresh:2;");
         }}
       
        
        
            
            
        
        
        
    

    ?>
</body>
</html>