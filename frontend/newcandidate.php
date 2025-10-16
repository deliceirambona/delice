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
    
<title>New Candidate</title>
<style>
    .error {
        color: red;
        font-size: 1.2em; /* Make the x a bit larger */
        font-weight: bold;
    }
    .valid {
        color: green;
        font-size: 1.2em; /* Make the v a bit larger */
        font-weight: bold;
    }
</style>
</head>
<body>

<h3>New Candidate</h3>
<form method="POST" id="candidateForm">
    <table>
        <tr>
            <td>cnid</td>
            <td>
                <input type="text" name="id" id="cnid">
                <span class="error" id="cnidError"></span>
                <span class="valid" id="cnidValid"></span>
            </td>
        </tr>
        <tr>
            <td>firstname</td>
            <td>
                <input type="text" name="fname" id="fname"required>
                <span class="error" id="fnameError"></span>
                <span class="valid" id="fnameValid"></span>
            </td>
        </tr>
        <tr>
            <td>lastname</td>
            <td>
                <input type="text" name="lname" id="lname">
                <span class="error" id="lnameError"></span>
                <span class="valid" id="lnameValid"></span>
            </td>
        </tr>
        <tr>
            <td>gender</td>
            <td>
                <input type="radio" name="sex" value="male" id="maleGender">male
                <input type="radio" name="sex" value="female" id="femaleGender">female
                <span class="error" id="genderError"></span>
                <span class="valid" id="genderValid"></span>
            </td>
        </tr>
        <tr>
            <td>dob</td>
            <td>
                <input type='date' name="dob" id="dob">
                <span class="error" id="dobError"></span>
                <span class="valid" id="dobValid"></span>
            </td>
        </tr>
        <tr>
            <td>dateofexam</td>
            <td>
                <input type="date" name="doe" id="doe">
                <span class="error" id="doeError"></span>
                <span class="valid" id="doeValid"></span>
            </td>
        </tr>
        <tr>
            <td>phone number</td>
            <td>
                <input type="text" name="pn" id="pn">
                <span class="error" id="pnError"></span>
                <span class="valid" id="pnValid"></span>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" value="save" name="sv">save</button></td>
        </tr>
    </table>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cnidInput = document.getElementById('cnid');
        const fnameInput = document.getElementById('fname');
        const lnameInput = document.getElementById('lname');
        const maleGenderInput = document.getElementById('maleGender');
        const femaleGenderInput = document.getElementById('femaleGender');
        const dobInput = document.getElementById('dob');
        const doeInput = document.getElementById('doe');
        const pnInput = document.getElementById('pn');
        const form = document.getElementById('candidateForm');

        const cnidError = document.getElementById('cnidError');
        const cnidValid = document.getElementById('cnidValid');
        const fnameError = document.getElementById('fnameError');
        const fnameValid = document.getElementById('fnameValid');
        const lnameError = document.getElementById('lnameError');
        const lnameValid = document.getElementById('lnameValid');
        const genderError = document.getElementById('genderError');
        const genderValid = document.getElementById('genderValid');
        const dobError = document.getElementById('dobError');
        const dobValid = document.getElementById('dobValid');
        const doeError = document.getElementById('doeError');
        const doeValid = document.getElementById('doeValid');
        const pnError = document.getElementById('pnError');
        const pnValid = document.getElementById('pnValid');

        // Function to display error or valid message
        function showValidationMessage(errorElement, validElement, isValid) {
            if (isValid) {
                errorElement.innerText = '';
                validElement.innerText = 'v';
            } else {
                errorElement.innerText = 'x';
                validElement.innerText = '';
            }
        }

        // Real-time validation functions
        function validateCnid() {
            const value = cnidInput.value.trim();
            // Check if the value is empty or contains non-digit characters
            if (value === '' || !/^\d+$/.test(value)) {
                showValidationMessage(cnidError, cnidValid, false);
            } else {
                showValidationMessage(cnidError, cnidValid, true);
            }
        }

        function validateFname() {
            const value = fnameInput.value.trim();
            if (value === '' || !/^[a-zA-Z]+$/.test(value)) {
                showValidationMessage(fnameError, fnameValid, false);
            } else {
                showValidationMessage(fnameError, fnameValid, true);
            }
        }

        function validateLname() {
            const value = lnameInput.value.trim();
            if (value === '' || !/^[a-zA-Z]+$/.test(value)) {
                showValidationMessage(lnameError, lnameValid, false);
            } else {
                showValidationMessage(lnameError, lnameValid, true);
            }
        }

        function validateGender() {
            const maleChecked = maleGenderInput.checked;
            const femaleChecked = femaleGenderInput.checked;
            if (!maleChecked && !femaleChecked) {
                showValidationMessage(genderError, genderValid, false);
            } else {
                showValidationMessage(genderError, genderValid, true);
            }
        }

        function validateDob() {
            const value = dobInput.value;
            if (value === '') {
                showValidationMessage(dobError, dobValid, false);
            } else {
                showValidationMessage(dobError, dobValid, true);
            }
            // Also re-validate date of exam if dob changes
            validateDoe();
        }

        function validateDoe() {
            const value = doeInput.value;
            const dobValue = dobInput.value;
            if (value === '' || (dobValue !== '' && new Date(value) < new Date(dobValue))) {
                showValidationMessage(doeError, doeValid, false);
            } else {
                showValidationMessage(doeError, doeValid, true);
            }
        }

        function validatePn() {
            const value = pnInput.value.trim();
            if (value === '' || !/^\d{10}$/.test(value)) {
                showValidationMessage(pnError, pnValid, false);
            } else {
                showValidationMessage(pnError, pnValid, true);
            }
        }

        // Add event listeners for real-time validation
        cnidInput.addEventListener('input', validateCnid);
        fnameInput.addEventListener('input', validateFname);
        lnameInput.addEventListener('input', validateLname);
        maleGenderInput.addEventListener('change', validateGender);
        femaleGenderInput.addEventListener('change', validateGender);
        dobInput.addEventListener('change', validateDob);
        doeInput.addEventListener('change', validateDoe);
        pnInput.addEventListener('input', validatePn);

        // Optional: Add a submit listener for final validation before sending
        form.addEventListener('submit', function(event) {
            // Perform all validations on submit
            validateCnid();
            validateFname();
            validateLname();
            validateGender();
            validateDob();
            validateDoe();
            validatePn();

            // Check if any error message (x) is visible
            const hasErrors = document.querySelectorAll('.error').some(span => span.innerText === 'x');

            if (hasErrors) {
                event.preventDefault(); // Prevent form submission if there are errors
                alert('Please fix the errors marked with "x" before submitting.');
            }
        });
    });
</script>

</body>
</html>
</html>
        <?php
        if(isset($_POST['sv'])){
            $a=$_POST['id'];
            $b=$_POST['fname'];
            $c=$_POST['lname'];
            $gender=$_POST['sex'];
            $e=$_POST['dob'];
            $f=$_POST['doe'];
            $g=$_POST['pn'];
            include "../web-db/connection.php";
            $queryinsert=mysqli_query($con,"insert into candidate values('','$a','$b','$c','$gender','$e','$f','$g')");
            if($queryinsert){
                echo "candidate registered successfully";
                header("refresh:2;");
        }}

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