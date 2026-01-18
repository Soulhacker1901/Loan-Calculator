<?php
   session_start();

   include("db.php");

   if($_SERVER['REQUEST_METHOD'] == "POST")
   {
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $gender = $_POST['gender'];
    $num = $_POST['number'];
    $address = $_POST['add'];
    $gmail = $_POST['mail'];
    $password = $_POST['pass'];

    if(!empty($gmail) && !empty($password) && !is_numeric($gmail))
    {
        $query = "insert into form(fname, lname, gender, cnum, address, email, pass) values('$firstname', '$lastname', '$gender', '$num', '$address', '$gmail', '$password')";

        mysqli_query($con, $query);

        echo "<script type='text/javascript'> alert('Successfully Register') </script>";
    }
    else{
        echo "<script type='text/javascript'> alert('Insert Valid information') </script>";
    }
   }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login and Register </title>

    <link rel="stylesheet" href="form-css/style.css">
</head>
<body>
    <div class="signup">
        <h1> Signup Up </h1>
        <form method="POST">
            <label>First Name </label>
            <input type="text" name="fname" required>

            <label>Last Name </label>
            <input type="text" name="lname" required>

            <label>Gender</label>
            <input type="text" name="gender" required>

            <label>Contact No </label>
            <input type="tel" name="number" required>

            <label>Address </label>
            <input type="text" name="add" required>

            <label>Email </label>
            <input type="email" name="mail" required>

            <label> Password </label>
            <input type="password" name="pass" required>

            <input type="submit" name="" value="Sign Up">

        </form>
        <h4> Already Have an Account? <a href="login.php"> Login Here</a> </h4>
          <p> By clicking Signup Up Button, You agree to our <br>
          <a href=""> Terms & Conditions</a> and <a href="#"> Privacy Policies</a>
        </p>
        
    </div>
</body>
</html>