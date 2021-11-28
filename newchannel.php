<?php
require_once "con.php";

if($uid){
if ($_POST['sub']) {


    $result = mysqli_query($con,"SELECT `roomid` FROM `room`") or exit("fail");
    $roomname = $_POST['roomname'];
    $roomid = mysqli_num_rows($result);
    $roomid = $roomid+1;

    $query1 = "INSERT INTO `room`(`roomid`,`adminid`, `name`) VALUES ($roomid,$uid,'".$roomname."')";
    $query2 = "INSERT INTO `participant` (`roomid`, `userid`) VALUES ($roomid,$uid)";
    $result = mysqli_query($con,$query1) or exit("fail");
    $result = mysqli_query($con,$query2) or exit("fail");

    if($result)
    {
        echo "Channel Added";
    }
    else
    {
        echo "Fail to add Channel";
    }

    mysqli_close($con);
}



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

    <title>Create Channel</title>
  </head>
  <body>
  

  <div class="content">
    
    <div class="container">
      
      

      <div class="table-responsive custom-table-responsive">

      </div>
      <table class="table custom-table">
          <tbody>
            <tr> 
                <td align="center">
<form action="" method="POST">
<p>Enter the Room Name :</p> 
<input type="name" name="roomname"/><br><br>
<input type="submit" value="Create Channel" name="sub">

</form>
</td>    
            </tr>
          </tbody> 
      </table>     

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