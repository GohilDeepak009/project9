<!-- INSERT INTO `user`(`userid`, `email`, `name`, `pass`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]') -->

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

    $result = mysqli_query($con, "SELECT `userid` FROM `user` WHERE `email` = '$mail'");

    if (mysqli_num_rows($result) == 0) {

        $result = mysqli_query($con, "INSERT INTO `user`(`email`, `name`, `pass`) VALUES ('$mail','$name','$password')");

        mysqli_close($con);

        if ($result) {
            header("Location: signin.php");
        } else {
            echo '<font color=""white>Fail to Sign Up</font>';
        }
    }
    else{
        echo '<font color="white">User with given e-mail already exists</font>'; 
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

    <title>Sign Up</title>
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

Name     :   <input type="text" name="name"/>

Password :   <input type="password" name="pass"/></font></p></pre>
                                <input type="submit" value="Sign Up" name="sub">
                                <br><br> <small><p> Already Having Account </small> <a href="signin.php" style="color:lightblue">SIGN IN</a></p>

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