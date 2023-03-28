<?php
include_once "actions/db_connect.php";

if (isset($_GET['id'])) {
    $sql = "SELECT * FROM `dishes` WHERE dishID = " . $_GET['id'];
    $result = mysqli_query($connect, $sql);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $img='';
    $txtBody='';

    if (mysqli_num_rows($result) > 0) {
        foreach ($rows as $row) {
$img= "
<img class='img-thumbnail' src='" .$row['image']."'>
";
$txtBody="{$row['description']}";
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
    <?php include "components/boot.php" ?>
    <link rel="stylesheet" href="components/Css/style.css">
    <title>Details</title>
</head>

<body id="details">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand txtFont" href="index.php">Restaurant</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="read.php">Our meals</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">

        <div class="card" style="width: 18rem;">
            <?= $img ?>
            <div class="card-body">
                <p class="card-text">
                    <?= $txtBody ?>
                </p>
                <a href="read.php" class="card-link"><img class="backImg" src="https://cdn-icons-png.flaticon.com/512/2099/2099166.png"></a>
            </div>
        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>