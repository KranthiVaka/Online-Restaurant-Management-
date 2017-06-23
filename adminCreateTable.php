<html>
    <head><meta charset="utf-8">
        <title>Admin request</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/table.css" rel="stylesheet" type="text/css">
        <link href="css/new.css" rel="stylesheet" type="text/css">
        <link href="css/home.css" rel="stylesheet" type="text/css">
    </head>
<body class="background">
	<div id="wrapper">
		<div id="login" class="animate form">
         <div id="settingLogin">
            <h1 style="top:-100%; position: absolute; left:21%; font-family: 'FranchiseRegular','Arial Narrow',Arial,sans-serif; display: bold; font-size: 40px;">Restaurant table creation</h1>
            
<?php
include('dbConnect.php');

$query1=mysqli_query($conn,"select id, oName,rName,email from res_owner");

echo "<table><tr><td>Owner Name</td><td>Restaurant Name</td><td>email</td><td></td>";
if(mysqli_num_rows($query1) > 0){
while($query2=mysqli_fetch_array($query1))
{
echo "<tr><td>".$query2['oName']."</td>";
echo "<td>".$query2['rName']."</td>";
echo "<td>".$query2['email']."</td>";

echo "<td><a href='mailReqAdmin.php?id=".$query2['id']."'>accept request</a></td>";

}
}
?>
             <div style="top:130%; position: absolute; left:44%; font-family: 'FranchiseRegular','Arial Narrow',Arial,sans-serif; display: bold; font-size: 20px;">
                 <a href="home.html"><b>Home</b></a> &nbsp;&nbsp;
            <a href="logout.php">Logout</a>
        </div>
</div></div></div>
</body>
</html>