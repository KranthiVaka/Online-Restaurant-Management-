<?php
session_start();
include_once 'dbConnect.php';

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if ($email == "email" || $password == "password") {
        $errormsg = "Enter both email and password";
    }// else if($email="admin@gmail.com" && &password="admin" ){ $errormsg="User is not admin";}
    else {
        $result = mysqli_query($conn, "select * from user WHERE email = '" . $email . "' and password = '" . $password . "'");
        $result1 = mysqli_query($conn, "select * from res_owner WHERE email = '" . $email . "' and password = '" . $password . "'");
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION['firstName'] = $row['firstName'];
                $name = $row["firstName"];
                if($name=="admin" && $password=="admin1234")
                    header("location:adminCreateTable.php");
                else
                header("Location: typeOfActivity.php");
            }
        } else if (mysqli_num_rows($result1) > 0) {
            while ($row = mysqli_fetch_assoc($result1)) {
                $_SESSION['email'] = $row['email'];
                $email=$row["email"];
                header("Location: ownerSelection.php");
            }
        } else
            $errormsg = "Password or email entered is incorrect or signup as new user";
    }
}
?>

<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="css/new.css" rel="stylesheet" type="text/css">

        <link href="css/home.css" rel="stylesheet" type="text/css">
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
    </head>
    <body class="background">
        <div>
            <a class="hiddenanchor" id="toregister"></a>
            <a class="hiddenanchor" id="tologin"></a>
            <div id="wrapper">
                <div id="login" class="animate form">

                    <div id="settingLogin">
                        <h1>Login</h1>
                        <form action="" method="post">
                            <div>                               
                                <label for="username"> Email </label>
                                <input type="text" name="email" width="200px" size="37" class="username" placeholder="email" required> </div>
                            <div>
                                <label for="password"> Password </label>
                                <input type="password" name="password" width="200px" size="37" class="Password" size="30" placeholder="password" required><br><br>                
                            </div>                
                            <span ><?php
if (isset($errormsg)) {
    echo $errormsg;
}
?></span><br>
                            <p class="login button"><input type="submit" name="login" value="Login"/></p>

                        </form>  
                    </div>
                    <div style="top:545%; position: absolute; left:35%; font-family: 'FranchiseRegular','Arial Narrow',Arial,sans-serif; display: bold; font-size: 20px;">
                        <a href="forgotPassword.php"><b>Forgot Password?</b></a>&nbsp;&nbsp;&nbsp;
                        <a href="resetPassword.php"><b>Reset Password?</b></a>&nbsp;&nbsp;&nbsp;
                        <a href="registerUser.php"><b>Sign Up</b></a>&nbsp;&nbsp;&nbsp;
                        <a href="home.html"><b>Home</b></a>
                    </div>

                </div>
            </div></div>
    </body>
</html>
