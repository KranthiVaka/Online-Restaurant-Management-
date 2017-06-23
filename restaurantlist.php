 
               <?php
               session_start();
               include('dbConnect.php');
               $name = $_SESSION["firstName"];
              
               $query=mysqli_query($conn,"select id,tname from res_owner");
               echo "<table><tr><td><b>Restaurant Name<b></td><td><b>Order items</b> </td></tr>";
               if(mysqli_num_rows($query) > 0){
               while($query1=mysqli_fetch_assoc($query))
               {
             echo "<tr><td>".$query1['tname']."</td>";
             if($query1['tname']=='sorento')
              echo "<td><a href='addCartSorento.php?id=".$query1['id']."&tname=".$query1["tname"]."'>Order Food</a></td>";   
            else if($query1['tname']=='waynscoffee')
             echo "<td><a href='addCartWayns.php?id=".$query1['id']."&tname=".$query1["tname"]."'>Order Food</a></td>";   
             else if($query1['tname']=='indisk')
                 echo "<td><a href='addCartIndisk.php?id=".$query1['id']."&tname=".$query1["tname"]."'>Order Food</a></td>";
             else if($query1['tname']=='time_out')
                 echo "<td><a href='addCartTimeout.php?id=".$query1['id']."&tname=".$query1["tname"]."'>Order Food</a></td>";
             else if($query1['tname']=='pm')
                 echo "<td><a href='addCartPm.php?id=".$query1['id']."&tname=".$query1["tname"]."'>Order Food</a></td>";
             else if($query1['tname']=='mitchels')
                 echo "<td><a href='addCartMitchels.php?id=".$query1['id']."&tname=".$query1["tname"]."'>Order Food</a></td>";
             else if($query1['tname']=='kebabhouse')
                 echo "<td><a href='addCartKebabhouse.php?id=".$query1['id']."&tname=".$query1["tname"]."'>Order Food</a></td>";
             else if($query1['tname']=='bergasapizzeria')
                 echo "<td><a href='addCartBergasapizza.php?id=".$query1['id']."&tname=".$query1["tname"]."'>Order Food</a></td>";
             
             echo "</tr>";
               } 
               }

else 
                 
    echo "No restaurants to display";  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Karls'Mat</title>
    <meta charset="UTF-8">
    <link href="css/table.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>

    <style>
       
        body{
            background: url("img/bg2.jpg");height: 100% ;
        }
        .jumbotron{
            background: url("img/bg3.g");
        }
    </style>

    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" media="all" />
</head>
<body>
<div class="container">
    <div class="jumbotron">
        <h1>Karls'Mat</h1>
        <h2>Restaurant list</h2>
        <h4 style="position: absolute;right:14%;top:10px; display: bold; font-size: 22px; "><b><?php echo $name ?></b></h4>
        <h5 style="position: absolute;right:5%;top:10px; display: bold; font-size: 22px;"><b> <a href="logout.php">Logout</a></b></h5>
    </div>
    <div class="row">
        <div class="col-lg-1">
        </div>
        <div class="col-lg-10">
            <table class="reference">
               
              
      

                </table>
        </div>
    </div>
</div>
</body>
</html>