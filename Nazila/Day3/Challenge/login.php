<?php
session_start();
if(isset($_SESSION['user'])){
    header('location: booktable.php');
}
if(isset($_SESSION['admin'])){
    header('location: dashboard.php');
}
require_once "actions/db_connect.php";
require_once "components/file_upload.php";



function cleanInput($param)
{
    $clean = trim($param); //take spaces out!
    $clean = strip_tags($clean); //take tags out!
    $clean = htmlspecialchars($clean);

    return $clean;
}
$fnameError = $lnameError = $dataError = $emailError = $passError = $emailloginError = $passLoginError = '';
$first_name = $last_name = $email = $username = $pwd = '';
$display = 'none';
if (isset($_POST['register'])) {
    $error = false;


    $first_name = cleanInput($_POST['firstname']);
    $last_name = cleanInput($_POST['lastname']);
    $date_of_birth = cleanInput($_POST['date-of-birth']);
    $email = cleanInput($_POST['email']);
    $password = cleanInput($_POST['password']);

    //Firstname validation
    if (empty($first_name)) {
        $error = true;
        $display = 'block';
        $fnameError = "Please Enter your Firstname.";
    } elseif (strlen($first_name < 2)) {
        $error = true;
        $display = 'block';
        $fnameError = "Firstname must have at least 2 char.";
    } elseif (!preg_match("/^[a-zA-Z]+$/", $first_name)) {
        $error = true;
        $display = 'block';
        $fnameError = "Firstname must contain only letters.";
    }
    //Lastname Validation
    if (empty($last_name)) {
        $error = true;
        $display = 'block';
        $lnameError = "Please Enter your Lastname.";
    } elseif (strlen($last_name < 2)) {
        $error = true;
        $display = 'block';
        $lnameError = "Lastname must have at least 2 char.";
    } elseif (!preg_match("/^[a-zA-Z]+$/", $last_name)) {
        $error = true;
        $display = 'block';
        $lnameError = "Lastname must contain only letters.";
    }
    //Email Validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $display = 'block';
        $emailError = "Please Enter Valid Email Address!";
    } else {
        $sqlStr = "SELECT email FROM users WHERE email='$email'";
        $res = mysqli_query($connect, $sqlStr);
        // var_dump($res);
        // die();
        if (mysqli_num_rows($res) != 0) {
            $error = true;
            $display = 'block';
            $emailError = "This Email already exist!";
        }
    }
    //Date of Birth
    if (empty($date_of_birth)) {
        $error = true;
        $display = 'block';
        $dataError = "Please enter your date of Birth.";
    }
    //Password Validation
    if (empty($password)) {
        $error = true;
        $display = 'block';
        $passError = "Please enter password.";
    } elseif (strlen($password) < 6) {
        $error = true;
        $display = 'block';
        $passError = "Password must have to at least 6 charachters.";
    }
    $password = hash("sha256", $password);

    //create user to database
    $picture = file_upload($_FILES['picture'], "user");
    if (!$error) {
        $strSql = "INSERT INTO `users`(`first_name`, `last_name`, `password`, `date_of_birth`, `email`, `picture`) 
        VALUES ('$first_name','$last_name','$password','$date_of_birth','$email','$picture->fileName')";
        $resultsql = mysqli_query($connect, $strSql);
        if ($resultsql) {
            $errType = 'success';
            $msg = 'Successfully Registered!';
            $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : "";
        } else {
            $errType = 'danger';
            $msg = 'Somethig wrong!';
            $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : "";
        }
    }
}

//LOGIN Section
$logindislay = 'none';
if (isset($_POST['login'])) {
    $loginError = false;
    $username = cleanInput($_POST['username']);
    $pwd = cleanInput($_POST['pwd']);

    //Email Validation
    if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $loginError = true;
        $logindislay = 'block';
        $emailloginError = "Please Enter Valid Email Address!";
    } else {
        $sqlStr = "SELECT email FROM users WHERE email='$email'";
        $res = mysqli_query($connect, $sqlStr);

        if (mysqli_num_rows($res) != 0) {
            $loginError = true;
            $logindislay = 'block';
            $emailloginError = "This Email already exist!";
        }
    }
    //Password Validation
    if (empty($pwd)) {
        $loginError = true;
        $logindislay = 'block';
        $passLoginError = "Please enter password.";
    } elseif (strlen($pwd) < 6) {
        $loginError = true;
        $logindislay = 'block';
        $passLoginError = "Password must have to at least 6 charachters.";
    }
    if (!$loginError) {
        $pwd = hash("sha256", $pwd);
        $strSqlLogin = "SELECT * FROM users WHERE email='$username' AND password='$pwd'";
        $resultLogin = mysqli_query($connect, $strSqlLogin);
        $count = mysqli_num_rows($resultLogin);
        $rowLogin = mysqli_fetch_assoc($resultLogin);

        //define $_SESSION Variable
        if ($count == 1) {
            if ($rowLogin['status'] == 'admin') {
                $_SESSION['admin'] = $rowLogin['id'];
                header("Location:dashboard.php");
            } else {
                $_SESSION['user'] = $rowLogin['id'];
                header("Location:reservetable/booktable.php");
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>LOGIN</title>

    <?php include "components/boot.php"; ?>
    <link rel="stylesheet" href="components/Css/login.css">

    <link rel="stylesheet" href="components/Css/style.css">

</head>

<body>
    <?php include_once "components/navbar.php"; ?>
    <div class="container">
        <?php
        if (isset($msg)) {
        ?>
            <div class="alert alert-<?= $errType ?>" role="alert">
                <?= $msg ?>
                <?= $uploadError ?>
            </div>
        <?php
        }
        ?>
        <div class="welcome">
            <div class="pinkbox">
                <div class="signup nodisplay">
                    <h1>sign up</h1>
                    <form autocomplete="off" action="<?= htmlspecialchars($_SERVER['SCRIPT_NAME']) ?>" method="POST" enctype="multipart/form-data">
                        <input type="text" placeholder="Firstname" name="firstname" value="<?= $first_name ?>">
                        <!-- <div class="alert alert-danger" role="alert">
                            <?= $fnameError ?>
                        </div> -->
                        <input type="text" placeholder="Lasttname" name="lastname" value="<?= $last_name ?>">
                        <!-- <div class="alert alert-danger" role="alert">
                            <?= $lnameError ?>
                        </div> -->
                        <input type="date" name="date-of-birth">
                        <!-- <div class="alert alert-danger" role="alert">
                            <?= $dataError ?>
                        </div> -->
                        <input type="email" placeholder="email" name="email" value="<?= $email ?>">
                        <!-- <div class="alert alert-danger" role="alert">
                            <?= $emailError ?>
                        </div> -->
                        <input type="password" placeholder="password" name="password">
                        <!-- <div class="alert alert-danger" role="alert">
                            <?= $passError ?>
                        </div> -->
                        <!-- <input type="password" placeholder="confirm password"> -->
                        <input type="file" placeholder="Upload Image" name="picture">
                        <button type="submit" class="button submit" name="register">create account </button>
                    </form>

                </div>
                <div class="signin">
                    <h1>sign in</h1>
                    <form class="more-padding" autocomplete="off" action="<?= htmlspecialchars($_SERVER['SCRIPT_NAME']) ?>" method="POST">
                        <input type="email" placeholder="username" name="username">
                        <span class="text-danger danger" style="display: <?= $logindislay ?>;"><?= $emailloginError ?></span>
                        <input type="password" placeholder="password" name="pwd">
                        <span class="text-danger danger" style="display: <?= $logindislay ?>;"><?= $passLoginError ?></span>
                        <button class="button submit" type="submit" name="login">login</button>
                    </form>
                </div>
            </div>
            <div class="leftbox">
                <!-- <h2 class="title"><span>BLOOM</span>&<br>BOUQUET</h2> -->
                <h2 class="title"><span>Lorem</span>&<br>Restaurant</h2>
                <!-- <p class="desc">pick your perfect <span>bouquet</span></p> -->
                <img class="flower smaller rounded-circle" src="https://cdn.pixabay.com/photo/2018/07/14/15/27/cafe-3537801_960_720.jpg" alt="" border="0">
                <p class="account">have an account?</p>
                <button class="button" id="signin">login</button>
            </div>

            <div class="rightbox">

                <h2 class="title"><span>Lorem</span>&<br>Restaurant</h2>
                <!-- <p class="desc"> pick your perfect <span>bouquet</span></p> -->
                <img class="flower rounded-circle" src="https://cdn.pixabay.com/photo/2021/03/16/10/04/street-6099209_960_720.jpg" />
                <p class="account">don't have an account?</p>
                <button type="button" class="button" id="signup">sign up</button>

            </div>


            <div class="rightbox">

                <div class="text-danger danger" style="display: <?= $display ?>;"><?= $fnameError ?></div>
                <div class="text-danger danger" style="display: <?= $display ?>;"><?= $lnameError ?></div>
                <div class="text-danger danger" style="display: <?= $display ?>;"><?= $dataError ?></div>
                <div class="text-danger danger" style="display: <?= $display ?>;"><?= $emailError ?></div>
                <div class="text-danger danger" style="display: <?= $display ?>;"><?= $passError ?></div>

            </div>


        </div>
    </div>

    </div>

    <script>
        $('#signup').click(function() {
            $('.pinkbox').css('transform', 'translateX(80%)');
            $('.signin').addClass('nodisplay');
            $('.signup').removeClass('nodisplay');
        });

        $('#signin').click(function() {
            $('.pinkbox').css('transform', 'translateX(0%)');
            $('.signup').addClass('nodisplay');
            $('.signin').removeClass('nodisplay');

        });
    </script>
    <?php include_once "components/bootjs.php"; ?>
</body>

</html>