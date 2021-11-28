<!-- //this page is to remove person from channel , this page is redirected by room -->

<?php



require_once "con.php";
if($uid){


$u = $_POST['u'];
$r = $_POST['r'];


if($uid == $_POST['adminid'])
{
       $result = mysqli_query($con,"DELETE FROM `participant` WHERE `roomid` = $r AND `userid`= $u");
        if($result){
            echo "Successfully Removed";
        }
        else
        {
            echo "Falied to remove";
        }
}
else
{
    echo "You are not authorized";
}

mysqli_close($con);

 }

else{
  header("Location: signin.php");
}

?>