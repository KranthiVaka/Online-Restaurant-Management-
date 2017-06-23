<?php
session_start();
include('dbConnect.php');
$name = $_SESSION["firstName"];
$tname=$_GET["tname"];
$_SESSION["$tname"]=$tname;
$table=$_SESSION["$tname"];
if (isset($_POST['submit'])) {
 $dates = $_POST['date'];
 $list=$_POST['list'];
$dt = explode(" ", $dates);
$date=$dt[0];
$time=$dt[1];

$result=mysqli_query($conn,"insert into booking values('$table','$date','$time','$list' )");
if($result>0)
    $errormsg= "Booked successfully";
else
   $errormsg= "Please try again..";
}

?>
<!doctype html>
<html lang = "en">
   <head>
      <meta charset = "utf-8">
      <title>Table Booking</title>
       <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
       <link rel="stylesheet" type="text/css" media="screen" href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
     <script type="text/javascript"
     src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js">
    </script> 
    <script type="text/javascript"
     src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js">
    </script>
    <script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
    </script>
    <script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.en.js">
    </script>
    <style>
        body{
            background: url("img/bg2.jpg");height: 100% ;
        }
        .jumbotron{
            background: url("img/bg3.g");
        }
    </style>

</head>
<body>
    <div class="container" style="width:60%;font-family: 'FranchiseRegular','Arial Narrow',Arial,sans-serif; font-size: 28px">
      
    <div class="jumbotron">
        <h1 style="font-size: 49px; position:absolute; top:8%; left:15% ">Karls'Mat</h1>
        <h2 style="font-size: 25px; position:absolute; top:15%; left:15%">Select Date And Time</h2>
        <h4 style="position: absolute;right:14%;top:10px; display: bold; font-size: 28px; "><b><?php echo $name ?></b></h4>
        <h5 style="position: absolute;right:5%;top:10px; display: bold; font-size: 28px;"><b> <a href="logout.php">Logout</a></b></h5>
        <form style="position:absolute; top:35%; left:37%" action="" method="post">
            <div id="datetimepicker" class="input-append date">
                <label style="font-size: 20px;font-weight: bold "> Time and Date:</label>
   <input type="text" name="date" style="height: 37px; width: 350px"></input>
<span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar" style="height: 40px; width: 14px"></i></span>
    </div>
            <div> <label style="font-size: 20px;font-weight: bold;">Number of persons:</label>
             <select name="list" style="color: black; font-size: 24px; height: 40px; width:378px">
                    <option>Select</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                     <option value="3">3</option>
                     <option value="4">4</option>
                     <option value="5">5</option>
                     <option value="6">6</option>
                    <option value="7">7</option>
                     <option value="8">8</option>
                     <option value="9">9</option>
                     <option value="10">10</option>
             </select></div>
           <div class="form-group" style="position:absolute; top:110%; left:37%"> <!-- Submit button -->
        <button class="btn btn-primary " name="submit" type="submit">Submit</button>
      </div>
        </form>
        <span style="position:absolute; top:65%; left:41%;font-weight: bold;"><?php
if (isset($errormsg)) {
    echo $errormsg;
}
?></span>
    
    <script type="text/javascript">
      $('#datetimepicker').datetimepicker({
        format: 'yyyy-MM-dd hh:mm:ss',
        language: 'en'   
        });
        
    </script>
   
    </div>
    </div>  
</body>
</html>