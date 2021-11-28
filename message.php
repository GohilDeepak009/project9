<!-- // this page displays messages, this page is redirected by home  -->

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

    <title>Messages</title>
  </head>
  <body>
  

  <div class="content">
    
    <div class="container">
       <h2 class="mb-5"><font size="20px"><?php echo $_POST['roomname'];?></font>    
      <br><br><br>

      
          <?php

$roomid = $_POST['roomid'];
$roomname = $_POST['roomname'];
$adminid = $_POST['adminid'];

//  echo "<h1>".$roomname."</h1><br><br>";

$result = mysqli_query($con, "SELECT * FROM `participant` WHERE `roomid` = $roomid AND `userid` = $uid");

$row = mysqli_fetch_assoc($result);

if ($row) {

    
    if ($uid == $adminid) {
        echo '<b><form action = "addmessage.php" method = "post"><input type="hidden" name ="roomname" value="' . $roomname . '"></input><input type="hidden" name ="adminid" value="' . $adminid . '"></input><input type="hidden" name ="roomid" value="' . $roomid . '"></input><input type=submit value ="add message" style = "height:30px;width:400px;font-size:20px"></input></form></b><br><br>';
    }
    else{
        echo '<b><form action = "" method = "post"><input type="hidden" name ="roomname" value="' . $roomname . '"></input><input type="hidden" name ="adminid" value="' . $adminid . '"></input><input type="hidden" name ="roomid" value="' . $roomid . '"></input><input type=submit value ="add message" disabled="true" style = "height:30px;width:400px;font-size:20px"></input></form></b><br><br>';
    }
?>
    <div class="table-responsive custom-table-responsive">

        <table class="table custom-table">
          <thead>
          </thead>
          <tbody>

<?php

    $result = mysqli_query($con, "SELECT * FROM `message` WHERE roomid = $roomid");

    $row = mysqli_fetch_assoc($result);

    while ($row) {
        echo "<tr><td><b>" . $row['message'] . "</b> <small>" . $row['dt'] . "</small></td>";
        echo '<td><embed src="'.$row['media'].'" height="200px" width="200px"></td></tr>';
        $row = mysqli_fetch_assoc($result);
    }
} else {
    echo '<font color="white">you are not authorized<br></font>';   // add redirection here
}

mysqli_close($con);

}

else{
  header("Location: signin.php");
}

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