<!-- // this page displays the people who are joined in the group , this page is redirected by home -->
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
<title>Channel Details</title>
  </head>
  <body>
  
<div class="content">
     <div class="container">
        <h2 class="mb-5"><font size="20px"><?php echo $_POST['roomname'];?></font></h2>
     <!-- <a href="newchannel.php" style="margin-left:850x"><button style="background-color: #25252b;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 30px;">+</button></a> -->
      <form action="invite.php" method="post"><input type="hidden" name="adminid" value="<?php echo $_POST['adminid']; ?>"/><input type="hidden" name="roomid" value="<?php echo $_POST['roomid']; ?>"/><input type="submit" value="INVITE" style="background-color: #25252b;border: none;color: white;padding: 7px 25px;text-align: center;text-decoration: none;display: inline-block;font-size: 30px;color:#777;"/></form>
     <div class="table-responsive custom-table-responsive">

        <table class="table custom-table">
          <thead>
          </thead>
          <tbody>
              
<?php
require_once "con.php";

if ($uid == $_POST['adminid']) {
   // echo '<h1>' . $_POST['roomname'] . '</h1>';
   // echo '<form action="invite.php" method="post"><input type="hidden" name="adminid" value="'.$_POST['adminid'].'"/><input type="hidden" name="roomid" value="'.$_POST['roomid'].'"/><input type="submit" value="INVITE" style="font-size:15px;margin-left:1000px;height:30px;width:150px"/></form>';
    $roomid = $_POST['roomid'];
    $result = mysqli_query($con, "SELECT participant.userid,user.name FROM `participant` LEFT JOIN `user` ON participant.userid = user.userid WHERE `roomid` = $roomid");

    $row = mysqli_fetch_assoc($result);
    


    while ($row) {
        if($row['userid']==$uid){
        $row = mysqli_fetch_assoc($result);
            continue;
        }
        else {
        echo '<tr align="center"><td><font size="6px">';
        echo $row['name'];
        echo '</font></td><td><form action="remove.php" method="post"><input type="hidden" name="adminid" value="' . $_POST['adminid'] . '"></input><input type="hidden" name="r" value="' . $_POST['roomid'] . '"></input><input type="hidden" name="u" value="' . $row['userid'] . '"></input><input type="submit" value="Remove" style="background-color: #25252b;border: none;color: #777;padding: 5px 5px;text-align: center;text-decoration: none;display: inline-block;font-size: 30px;height:50px;width:150px"></input></form></td></tr><br><br>';
        $row = mysqli_fetch_assoc($result);
        }
    }
    


} else {
    echo "You are not authorized";
}

mysqli_close($con);
 }

else{
  mysqli_close($con);
  header("Location: signin.php");
}

?>
