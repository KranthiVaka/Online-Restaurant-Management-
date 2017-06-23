<?php

session_start();
include_once 'dbConnect.php';
$error = false;
if(isset($_GET['id']))
{
$id=$_GET['id'];
if(isset($_POST['request']))
{
$tname = mysqli_real_escape_string($conn, $_POST['tname']);
$result= mysqli_query($conn, "create table ".$tname."(id int(11) NOT NULL AUTO_INCREMENT, menu varchar(255) NOT NULL,price int(11) NOT NULL,PRIMARY KEY (id))");
$query=mysqli_query($conn,"update res_owner set tname='$tname' where id='$id'");
$query1=mysqli_query($conn, "select email from res_owner where id='$id'");
$query2=mysqli_fetch_array($query1);
if($query2){
  $to= $query2['email'];
  $subject='Regarding details of new online restaurant';
   $password = "";
  $charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  
  for($i = 0; $i < 8; $i++)
  {
     $random_int = mt_rand();
     $password .= $charset[$random_int % strlen($charset)];
 }
  $message= 'Email and Password:' ." ."."." .$query2['email']." ." .$password;
  $headers='From: karlsmat1995@gmail.com';
  $m=mail($to,$subject,$message,$headers);
if($m){
    $errormsg= "mail sent";
    mysqli_query($conn,"update res_owner set password='$password' where id='$id'");
    
}
else 
     $errormsg= "mail failed to send";
    
}
else 
     $errormsg= "Failure getting email ";
}
}
?>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Admin request</title>
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
            <h1 style="top:-50%; position: absolute; left:21%; font-family: 'FranchiseRegular','Arial Narrow',Arial,sans-serif; display: bold; font-size: 40px;">Owner Registration</h1>
            
            <br><form action="" method="post">
              <div>
                           Table Name:<input type="text" width=200px class="text" name="tname" size="37"placeholder="Enter Owner Name" required value="<?php if ($error) echo $firstname; ?>"  id="active"/>
                        <p style="color: #FF0000; font-weight: bold; font-size: 24px"><?php if (isset($o_error)) echo $o_error; ?></p> 
                        </div>
                        
                        <p class="login button">  
                        <input type="submit"  style="font-size:20px; font-weight: bold; " name="request" value="Request"/>          
                        </p>
                        <div> 
                                        
                                        <span style="color: red;"><?php
                                            if (isset($errormsg)) {
                                                echo $errormsg;
                                            }
                                            ?></span>
</div>
                
            </form>
             <div style="top:95%; position: absolute; left:47%; font-family: 'FranchiseRegular','Arial Narrow',Arial,sans-serif; display: bold; font-size: 20px;">
            <a href="home.html"><b>Home</b></a> 
        </div>
         </div>
                </div>
        </div></div>
</body></html>