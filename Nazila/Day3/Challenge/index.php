<?php
session_start();

if (isset($_SESSION['user'])) {
    header('Location:../reservetable/booktable.php');
} 
if (!isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
    header('Location:../login.php');
}
if(isset($_SESSION['admin'])) {
    header('Location:menu/read.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-Day3-Challenge</title>

    <?php include_once "components/boot.php"; ?>
    <link rel="stylesheet" href="components/Css/style.css">

</head>

<body id="index">
    <?php require "components/navbar.php"; ?>


    <div class="img">
        <img src="https://cdn.pixabay.com/photo/2021/03/16/10/04/street-6099209__340.jpg">
        <a href="login.php" role="button" class="btn btn-light book">Book a Table</a>
        <a href="menu/read.php" role="button" class="btn btn-light menu">Our Menu</a>
    </div>
    <div class="container">

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>