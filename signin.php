
<?php

if ($_POST['sub']) {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "project9";

    $name = $_POST['name'];
    $mail = $_POST['mailid'];
    $password = md5($_POST['pass']);

    $con = mysqli_connect($host, $user, $pass, $database);
    $query = "SELECT `userid` FROM `user` WHERE `email` = '$mail' AND `pass` = '$password'";
    $result = mysqli_query($con,$query) or exit("fail");
    $num_row = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    
    mysqli_close($con);

    if ($num_row == 0) {

        echo '<font color="white">Please Sign Up </font>'; 

    }
    else{
        session_start();
        
        $_SESSION['uid'] = $row['userid'];
        //echo '<font color="white">'.$query ."<br>".$row['userid'].$_SESSION["uid"]."<font>";
        header("Location: index.php");

    }
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

    <title>Sign In</title>
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

                                <pre><p><font size="4px">
E-mail   :   <input type="mail" name="mailid"/>

Password :   <input type="password" name="pass"/></font></p></pre>
                                <input type="submit" value="Sign In" name="sub">
                           <br><br> <small><p> Not Having Account </small> <a href="register.php" style="color:lightblue">SIGN UP</a></p>
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