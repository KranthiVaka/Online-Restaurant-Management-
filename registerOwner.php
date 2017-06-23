<?php

session_start();
include_once 'dbConnect.php';
$error = false;
if (isset($_POST['request'])) {
    $oname = mysqli_real_escape_string($conn, $_POST['oname']);
    $rname = mysqli_real_escape_string($conn, $_POST['rname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
   
    if (!preg_match("/^[a-zA-Z ]+$/", $oname)) {
        $error = TRUE;
        $o_error = "*Owner name must contain only alphabets and space.";
    }
    if (!preg_match("/^[a-zA-Z ]+$/", $rname)) {
        $error = true;
        $r_error = "*Restaurant Name must contain only alphabets and space.";
    }
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "*Please Enter Valid Email ID.";
    }
    if (!$error) {
        if (mysqli_query($conn, "INSERT INTO res_owner(id, oname, rname, email) VALUES(' ','" . $oname . "', '" . $rname . "', '" . $email . "')"))
    $successmsg = "You have sent request successfully"; 
     else
            $errormsg = "Sending request failed";
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
            <h1 style="top:9%; position: absolute; left:21%; font-family: 'FranchiseRegular','Arial Narrow',Arial,sans-serif; display: bold; font-size: 40px;">Owner Registration</h1>
            <br>
            <br>
            <br>
            <br>
            <br><form action=" " method="post">
              <div>
                           Owner Name:<input type="text" width=200px class="text" name="oname" size="37"placeholder="Enter Owner Name" required value="<?php if ($error) echo $oname; ?>"  id="active"/>
                        <p style="color: #FF0000; font-weight: bold; font-size: 24px"><?php if (isset($o_error)) echo $o_error; ?></p> 
                        </div>
                        <div>
                            Restaurant Name:<input type="text" width=200px  class="text" name="rname" size="37" placeholder="Enter Restaurant Name" required value="<?php if ($error) echo $rname; ?>"/>
                            <p style="color: #FF0000; font-weight: bold; font-size: 24px"><?php if (isset($r_error)) echo $r_error; ?></p>
                        </div>
                        <div>
                       Email:<input type="text"  width=200px class="text" name="email" placeholder="Enter Valid Email" required value="<?php if ($error) echo $email; ?>"/>
                       <p style="color: #FF0000; font-weight: bold; font-size: 24px"><?php if (isset($email_error)) echo $email_error; ?></p></div>
                        <p class="login button">  
                        <input type="submit"  style="font-size:20px; font-weight: bold; " name="request" value="Request"/>          
                        </p>
                        <div> 
                                        <span style="color: red;" ><?php
                                            if (isset($successmsg)) {
                                                echo $successmsg;
                                            }
                                            ?></span>
                                        <span style="color: red;"><?php
                                            if (isset($errormsg)) {
                                                echo $errormsg;
                                            }
                                            ?></span>
</div>
                
            </form>
             <div style="top:95%;position: absolute; left:47%; font-family: 'FranchiseRegular','Arial Narrow',Arial,sans-serif; display: bold; font-size: 20px;">
            <a href="home.html"><b>Home</b></a>  
        </div>
         </div>
                </div>
        </div></div>
</body></html>