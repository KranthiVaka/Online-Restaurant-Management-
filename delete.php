<html>
       <link href="css/table.css" rel="stylesheet" type="text/css">
        <link href="css/new.css" rel="stylesheet" type="text/css">
        <link href="css/home.css" rel="stylesheet" type="text/css">
<body>
    <body class="background">
	<div id="wrapper">
		<div id="login" class="animate form">
         <div id="settingLogin">
            <h1 style="top:-6%; position: absolute; left:21%; font-family: 'FranchiseRegular','Arial Narrow',Arial,sans-serif; display: bold; font-size: 40px;">Menu</h1>
            <br>
            <br>
<?php
session_start();
include('dbConnect.php');
$email=$_SESSION['email'];
$query=mysqli_query($conn,"select tname from res_owner where email = '" . $email . "'");
$res= mysqli_fetch_array($query);
if(isset($_GET['id']))
{
$id=$_GET['id'];
$query1=mysqli_query($conn,"delete from ".$res['tname']." where id='$id'");
if($query1)
{
header('location:ownerMenuTable.php');
}
}
?>
    <div style="top:120%; position: absolute; left:28%; font-family: 'FranchiseRegular','Arial Narrow',Arial,sans-serif; display: bold; font-size: 20px;">
                 <a href="home.html"><b>Home</b></a> &nbsp;&nbsp;
            <a href="logout.php">Logout</a>
        </div>
</div></div></div>
</body>
</html>
 