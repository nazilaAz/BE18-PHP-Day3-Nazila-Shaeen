<?php

session_start();
if (!isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
    header('Location:../login.php');
}
if (isset($_SESSION['admin'])) {
    header('Location:../dashboar.php');
} 
if(isset($_SESSION['user'])) {
    header('Location:../login.php');
} 

require_once "../actions/db_connect.php";

$sql = "SELECT * FROM users WHERE id={$_SESSION['user']}";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $row['first_name']; ?></title>
    <?php include_once "../components/boot.php"; ?>
    <link rel="stylesheet" href="../components/Css/style.css">
    <link rel="stylesheet" href="../components/Css/login.css">

</head>

<body id="book">
    <nav class="navbar navbar-expand-lg" style="background-color: #f6f6f6;">
        <div class="container-fluid">
            <a class="navbar-brand txtFont">Ristorante Il Gambero Rosso</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="../menu/read.php">Menu</a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="login.php">Book a table</a>
                    </li> -->
                </ul>
            </div>
            <div class="collapse navbar-collapse justify-content-end ps-5" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link rightLogin"><?= $row['first_name']; ?></a>
                    </li>
                    <li class="nav-item">
                        <img class="img-thumbnail" src="../pictures/<?=$row['picture'];?>" >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rightLogin" href="logout.php?logout"><i class="bi bi-box-arrow-left"></i> Logout</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

   
   
    <div class="container">
        <div class="welcome">
            
            <div class="leftbox">
            <h1>new reservation</h1>
                    <form autocomplete="off" action="../actions/a_create_table.php" method="POST" enctype="multipart/form-data">
                        <input class="form-control form-control-sm" type="number" placeholder="Number of Persone" min="1" max="99" name="nop">
                     
                        <input class="form-control form-control-sm" type="date" name="reserveDate">
                        <input class="form-control form-control-sm" type="time" name="reserveTime">
                       
                        <textarea class="form-control form-control-sm" rows="3" name="description" placeholder="note"></textarea>     
                        <button type="submit" class="button submit" name="book">Book now</button>
                        <button type="submit" class="button submit read " name="book">view your reservation</button>
                        <a href="" role="submit" class="button submit read update" name="update">update your reservation</a>
                        <a href="" role="submit" class="button submit read delete" name="delete">delete your reservation</a>
                    </form>
            </div>
         
        </div>
    </div>

    </div>
  
    <?php include_once "../components/bootjs.php"; ?>

</body>

</html>