<html>
       <link href="css/table.css" rel="stylesheet" type="text/css">
        <link href="css/new.css" rel="stylesheet" type="text/css">
        <link href="css/home.css" rel="stylesheet" type="text/css">
<body>
    <body class="background">
	<div id="wrapper">
		<div id="login" class="animate form">
         <div id="settingLogin">
            <h1 style="top:4%; position: absolute; left:21%; font-family: 'FranchiseRegular','Arial Narrow',Arial,sans-serif; display: bold; font-size: 40px;">Menu</h1>
            <br>
            <br>
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

if(isset($_POST['submit']))
{
$menu=$_POST['menu'];
$price=$_POST['price'];
$query3=mysqli_query($conn,"update ".$res['tname']." set menu='$menu', price='$price' where id='$id'");
if($query3)
{
header('location:ownerMenuTable.php');
}
}
$query1=mysqli_query($conn, "select id,menu,price from ".$res['tname']." where id='$id'");
$query2=mysqli_fetch_array($query1);
?>
<form method="post" action="">
    Menu:<input type="text" name="menu" placeholder="edit menu" value="<?php echo $query2['menu']; ?>" /><br />
Price:<input type="text" name="price" placeholder="SEK" value="<?php echo $query2['price']; ?>" /><br /><br />
<br />
<p class="login button"><input type="submit" name="submit" value="update" /></p>
</form>
<?php
}
?>
    <div style="top:100%; position: absolute; left:28%; font-family: 'FranchiseRegular','Arial Narrow',Arial,sans-serif; display: bold; font-size: 20px;">
                 <a href="home.html"><b>Home</b></a> &nbsp;&nbsp;
            <a href="logout.php">Logout</a>
        </div>
</div></div></div>
</body>
</html>