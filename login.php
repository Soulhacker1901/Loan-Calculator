<?php
   session_start();

   include("db.php");

   if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $gmail = $_POST['mail'];
        $password = $_POST['pass'];

        if(!empty($gmail) && !empty($password) && !is_numeric($gmail))
        {
            $query = "select * from form where email = '$gmail' limit 1";
            $result = mysqli_query($con, $query);

            if($result)
            {
             if($result && mysqli_num_rows($result) > 0)
                {
                  $user_data = mysqli_fetch_assoc($result);

                    if($user_data['pass'] == $password)
                    {
                        header("location:index.html");  // Here we can add our Main HTML file(index.html) 
                        die;                             // by which we can navigate on that main page of our project 
                    }                                    // after succession of login form 
                }
            }

            echo "<script type='text/javascript'> alert('Wrong Password or username') </script>";
        }

        else
        {
            echo "<script type='text/javascript'> alert('Wrong Password or username') </script>";
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
    <div class="login">
        <h1> Login </h1>
        <form method="POST">
            <label>Email </label>
            <input type="email" name="mail" required>

            <label> Password </label>
            <input type="password" name="pass" required>

            <input type="submit" name="" value="Log In">
        </form>
        <h4>Not Have an Account? <a href="signup.php">Signup Here </a> </h4>
        </div>

</body>
</html>