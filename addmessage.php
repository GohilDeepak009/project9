<?php
require_once "con.php";
if($uid){


// echo"<pre>";
// print_r($_POST);
// print_r($_FILES['media']);
// echo"</pre>";


if ($_POST['adminid']==$uid) {
    if($_POST['sub']){

       $result = mysqli_query($con,"SELECT `messageid` FROM `message`");
       $messageid = mysqli_num_rows($result);
       $messageid += 1;
       $ismedia = false;

        if($_FILES){
            $ismedia = true;
            $extension = strtolower(end(explode(".",$_FILES['media']['name'])));

            $path ="upload/".$messageid.".".$extension;
            $tmpname = $_FILES['media']['tmp_name'];

            $isupload = move_uploaded_file($tmpname,$path);
            
        }
        $roomid = $_POST['roomid'];
        $message = $_POST['message'];
        $dt = $_POST['date'];


        
            $query = "INSERT INTO `message` (`messageid`, `roomid`, `message`, `ismedia`, `media`, `dt`) VALUES ($messageid,$roomid, '$message', $ismedia,'$path','$dt')";
          $result = mysqli_query($con,$query);
            if ($result) {
                echo '<font color="white">succesfully added</font>';
            }
            else{
                echo '<font color="white">fail to add';
                //echo $query;
                echo "</font>";
            }
            
        

    }


}
else {
    echo '<font color="white">You are not authorized</font>';
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

    <title>Add Message</title>
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
                    
    <form action="" method="post" enctype="multipart/form-data" style="padding: 50px 50px">
        
        <input type="hidden" name="roomname" value="<?php echo $_POST['roomname'];?>">
      
        <input type="hidden" name="adminid" value="<?php echo $_POST['adminid'];?>">
        <input type="hidden" name="roomid" value="<?php echo $_POST['roomid'];?>">
        <input type="hidden" name="date" value="<?php echo date("Y-m-d H:i:s");?>">
        Enter the message :
        <textarea type="text" name="message"></textarea><br><br> 
        Select the file : 
        <input type="file" name="media"><br><br>
        <input type="submit" value="Add message" name="sub">

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
