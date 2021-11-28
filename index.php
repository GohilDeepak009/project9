<!-- //this is the home landing page where all channels joined by user is displayed -->
<?php
require_once "con.php";
if($uid){
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Home</title>
  </head>
  <body>
  

  <div class="content">
    
    <div class="container">
       <pre> <h2 class="mb-5"><font size="20px">Channels</font>                                                                                                                                                                   <a href="signout.php""><button style="background-color: #25252b;border: none;color: white;padding: 15px 15px;text-align: center;text-decoration: none;display: inline-block;font-size: 15px;">Sign Out</button></a>
</h2></pre> <a href="newchannel.php" style="margin-left:850x"><button style="background-color: #25252b;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 30px;">+</button></a>
      
      <br>

      <div class="table-responsive custom-table-responsive">

        <table class="table custom-table">
          <thead>
          </thead>
          <tbody>
              
<?php

require_once "con.php";

$query1 = "SELECT participant.userid,room.roomid,room.name,room.adminid FROM `participant` LEFT JOIN `room` ON participant.roomid = room.roomid WHERE `userid` = $uid"; 

$result1 = mysqli_query($con,$query1);

$row = mysqli_fetch_assoc($result1);



/* style="background-color: #25252b;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;"
  */

while ($row) {
   // print_r($row);
    echo '<td><b><form action = "message.php" method = "post"><input type="hidden" name ="roomname" value="'.$row['name'].'"></input><input type="hidden" name ="adminid" value="'.$row['adminid'].'"></input><input type="hidden" name ="roomid" value="'.$row['roomid'].'"></input><input type=submit value ="'.$row['name'].'" style="background-color: #25252b;border: none;color: #777;text-align: center;text-decoration: none;display: inline-block;font-size: 30px;height:50px;width:400px"></input></form></b></td>';
   
    if ($uid == $row['adminid']) {
        echo '<td><b><form action = "room.php" method = "post"><input type="hidden" name ="roomname" value="'.$row['name'].'"></input><input type="hidden" name ="adminid" value="'.$row['adminid'].'"></input><input type="hidden" name ="roomid" value="'.$row['roomid'].'"></input><input type=submit value ="&#x2699" style="background-color: #25252b;border: none;color: #777;text-align: center;text-decoration: none;display: inline-block;font-size: 30px;height:50px;width:100px"></input></form></b></td>';
    }
    else
    {
        echo "<td></td>";
    }
    echo "</tr>";
    $row = mysqli_fetch_assoc($result1);

}

mysqli_close($con);

?>
</tbody>
        </table>
      </div>


    </div>

  </div>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
<?php }

else{
  header("Location: signin.php");
}

?>
