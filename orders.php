
<html>
    <head><meta charset="utf-8">
        <title>Admin request</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/table1.css" rel="stylesheet" type="text/css">
        <link href="css/new.css" rel="stylesheet" type="text/css">
        <link href="css/home.css" rel="stylesheet" type="text/css">
    </head>
<body class="background">
	<div id="wrapper">
		<div id="login" class="animate form">
         <div id="settingLogin">
       <div id="settingLogin">
            <h1 style="position: absolute;right:29%;top:-29%; font-family: 'FranchiseRegular','Arial Narrow',Arial,sans-serif; display: bold; font-size: 40px;"><b>List of Orders</b></h1>
            <br>
            
                <?php
session_start();
include('dbConnect.php');
$email= $_SESSION["email"];
$query=mysqli_query($conn,"select tname from res_owner where email = '" . $email . "'");
if(mysqli_num_rows($query) > 0){
while($query3=mysqli_fetch_array($query))
{  
$query1=mysqli_query($conn,"select * from delivery");
echo "<table><tr><td><b>Restaurant Name</b></td><td><b>Name</b></td><td><b>Address</b></td><td><b>Menu</b></td><td><b>Quantity</b></td><td><b>Extra</b></td><td><b>Payment</b></td><td></td>";
if(mysqli_num_rows($query1) > 0){
while($query2=mysqli_fetch_array($query1))
{
    if(($query3['tname'])==($query2['tname'])){
    echo "<tr><td>".$query2['tname']."</td>";
   
echo "<td>".$query2['name']."</td>";
echo "<td>".$query2['address']."</td>";
    echo "<td>".$query2['menu']."</td>";
    echo "<td>".$query2['quantity']."</td>";
    echo "<td>".$query2['extra']."</td>";
    echo "<td>".$query2['payment']."</td>";
    }
 else "No booking";
}
}
}}
?> 
             
        </div>
             <div style="top:120%; position: absolute; left:35%; font-family: 'FranchiseRegular','Arial Narrow',Arial,sans-serif; display: bold; font-size: 20px;">
                    <a href="home.html"><b>Home</b></a>&nbsp;&nbsp;
                        <a href="logout.php"><b>Logout</b></a>
                        </div>
</div></div></div>
</body>
</html>