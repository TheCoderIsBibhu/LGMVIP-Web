<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['login'])) {
    header("location:admin.php");
}
include "include/connection.php";


if (isset($_POST['log'])) {
    $username = mysqli_real_escape_string($con, $_POST['name']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);
    $sql = "SELECT * FROM admin WHERE email='$username' and pass='$password'";
    $res = mysqli_query($con, $sql) or die("query failled");
    $cnt = mysqli_num_rows($res);
    if ($cnt > 0) {
        while ($row = mysqli_fetch_assoc($res)) {

            $_SESSION['login'] = "yes";
            $_SESSION['mail'] = $row['email'];
            $_SESSION['name'] = $row['name'];
            header('location:admin.php');
        }
    } else {


        echo "<script>alert('Please enter correct details')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>
    <section class="log-sec">
        <div class="back1">
        </div>
        <div class="back2"></div><br><br>
        <div class="container" id="container">
            <div class="overlay-container">
                <div class="overlay">

                </div>
            </div>
            <div class="form-container sign-in-container">
                <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                    <h1>Admin Login</h1>
                    <br>
                    <input type="text" name="name" placeholder="User Id" />
                    <input type="password" name="pass" placeholder="Password" />
                   
                    <input type="submit" class="sign" name="log" value="Login">
                </form>
            </div>

        </div>


    </section>

    <script src="javascript/jquery.min.js"></script>
    <script src="javascript/bootstrap.min.js"></script>
</body>

</html>