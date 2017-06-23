<html>
    <link href="css/table.css" rel="stylesheet" type="text/css">
        <link href="css/new.css" rel="stylesheet" type="text/css">
        <link href="css/home.css" rel="stylesheet" type="text/css">
<body>
    <body class="background">
	<div id="wrapper">
		<div id="login" class="animate form">
         <div id="settingLogin">
            <h1 style="top:-9%; position: absolute; left:21%; font-family: 'FranchiseRegular','Arial Narrow',Arial,sans-serif; display: bold; font-size: 40px;">Menu</h1>
            <br>
            <br>
<?php
session_start();
include('dbConnect.php');
$email=$_SESSION['email'];
$query=mysqli_query($conn,"select tname from res_owner where email = '" . $email . "'");
$res= mysqli_fetch_array($query);
$query1=mysqli_query($conn,"select id, menu, price from ".$res['tname']."");
echo "<table><tr><td>Menu</td><td>Price</td><td></td><td></td>";
if(mysqli_num_rows($query1) > 0){
while($query2=mysqli_fetch_array($query1))
{
echo "<tr><td>".$query2['menu']."</td>";
echo "<td>".$query2['price']."</td>";
echo "<td><a href='edit.php?id=".$query2['id']."'>Edit</a></td>";
echo "<td><a href='delete.php?id=".$query2['id']."'>Delete</a></td><tr>";
}
echo "<td><a href='add.php?id=".$query2['id']."'>Add</a></td><tr>";
}
else
header("location:add.php" );
?>
</ol>
</table>
<div style="top:120%; position: absolute; left:28%; font-family: 'FranchiseRegular','Arial Narrow',Arial,sans-serif; display: bold; font-size: 20px;">
                 <a href="home.html"><b>Home</b></a> &nbsp;&nbsp;
            <a href="logout.php">Logout</a>
        </div>
</div></div></div>
</body>
</html>