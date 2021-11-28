
<?php
 
 require_once "con.php";
 if($uid){
 
 
 
// print_r($_POST);

if($uid == $_POST['adminid'])
{
    if ($_POST['sub']) {
       
        $query1 = "SELECT * FROM `user` WHERE `email` = '".$_POST['mailid']."'";
       
        $result = mysqli_query($con,$query1) OR exit("fail");    
        $row = mysqli_fetch_assoc($result);

        if ($row) {
        
        
        
        $r = $_POST['roomid'];
        $u = $row['userid'];

        $query2 = "INSERT INTO `participant` (roomid,userid) SELECT * FROM (SELECT $r,$u) AS tmp WHERE NOT EXISTS ( SELECT * FROM `participant` WHERE roomid= $r AND userid= $u ) LIMIT 1";
        
        $result = mysqli_query($con,$query2);
        
        if($result){
            echo '<font color="white"><br><br>user added</font>';
        }
        else{
            echo '<font color="white">failed to add user</font>';
        }

            
        }
        else{
            echo '<font color="white">no such user found</font>';
        }

        

    }



}
else{
    echo '<font color="white">You are not authorized</font>';
}
mysqli_close($con);
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

    <title>Invite</title>
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
                  <form action="" method="post">
                    
<input type="hidden" name="adminid" value="<?php echo $_POST['adminid'];?>"/>
<input type="hidden" name="roomid" value="<?php echo $_POST['roomid'];?>"/>
<pre><p> Enter the mailid of person whom you want to add in channel</p></pre>
<input type="mail" name="mailid"/><br><br>
<input type="submit" value="Add To Channel" name="sub">

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
