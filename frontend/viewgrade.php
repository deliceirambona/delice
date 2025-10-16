<?php session_start();
 if(!isset($_SESSION["pass"])) {
header("location:../index.php");
}
else{

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
	<style>
		

		
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
	<h3>View Grade</h3>
            <form method="POST" action="">
                <label for="cnid">Candidate Name:</label><br>
                <select name="cnid" id="cnid">
                    <option value="">Please Select Candidate Name</option>
                    <?php
                    include "../web-db/connection.php";
                    $query = mysqli_query($con, "SELECT DISTINCT candidate.cnid, candidate.firstname, candidate.lastname 
                        FROM candidate 
                        INNER JOIN grade ON candidate.cnid = grade.cnid 
                        ORDER BY firstname ASC");
                    while ($rows = mysqli_fetch_array($query)) {
                        echo "<option value='" . $rows['cnid'] . "'>" . $rows['firstname'] . " " . $rows['lastname'] . "</option>";
                    }
                    ?>
                </select>
                <input type="submit" name="savebtn" value="Check">
            </form>

            <?php
            if (isset($_POST['savebtn'])) {
                $pname = $_POST['cnid'];
                include "../web-db/connection.php";
                $select = mysqli_query($con, "SELECT candidate.cnid, candidate.firstname, candidate.lastname, 
                    candidate.gender, grade.lxc, grade.marks, grade.decision 
                    FROM candidate 
                    INNER JOIN grade ON candidate.cnid = grade.cnid 
                    WHERE candidate.cnid = '$pname'");

                if (mysqli_num_rows($select) > 0) {
                    echo "<table border='1'>";
                    echo "<tr>
                        <th>No</th>
                        <th>CNID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>License Exam Category</th>
                        <th>Marks</th>
                        <th>Decision</th>
                        <th>Operation</th>
                    </tr>";

                    $i = 1;
                    while ($rows = mysqli_fetch_array($select)) {
                        echo "<tr>
                            <td>{$i}</td>
                            <td>{$rows['cnid']}</td>
                            <td>{$rows['firstname']}</td>
                            <td>{$rows['lastname']}</td>
                            <td>{$rows['gender']}</td>
                            <td>{$rows['lxc']}</td>
                            <td>{$rows['marks']}</td>
                            <td>{$rows['decision']}</td>
                            <td>
                                <button><a href='updategrade.php?up={$rows['cnid']}'>Update</a></button>
                            </td>
                        </tr>";
                        $i++;
                    }
                    echo "</table>";
                } else {
                    echo "<p>No grade records found for this candidate.</p>";
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