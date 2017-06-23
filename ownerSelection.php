<?php
session_start();
include_once 'dbConnect.php';
$email= $_SESSION["email"];
?>

<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <title>activity</title>
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
            <h1 style=" top:-170%; position: absolute; left:20%">Select Activity</h1>
            
            <p style="position: absolute; top:-160%; left:170% "> <a href="logout.php">Logout</a></p>
            <form name="userrequest "action="" method="post">
                <div>                               
                    <label> Select type of activity</label>&nbsp;&nbsp;
                    
                <select name="list"style="color: black; font-weight: bold; font-size: 24px; height: 40px;" onchange="window.location.href=this.value;">
                    <option>---Select---</option>
                    <option value= "ownerMenuTable.php" name="lstr" id="lstr">Change Menu</option>
                    <option value="reservationorders.php" name="bkt" id="bkt">Check Reservations</option>
                        <option value="orders.php" name="bkt" id="bkt">Check Orders</option>
                </select>
                </div>
                <br>
                
                </form>  
        </div>
                   
                     <div style="top:340%; position: absolute; left:49%; font-family: 'FranchiseRegular','Arial Narrow',Arial,sans-serif; display: bold; font-size: 20px;">
                         <a href="home.html"><b>Home</b></a>
                         
                     </div>
 
</form>
        </div></div>
    </body>
                </html>



