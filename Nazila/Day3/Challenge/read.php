<?php
include_once "actions/db_connect.php";

$sql = "SELECT * FROM dishes";
$result = mysqli_query($connect ,$sql);



$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

$tbody=''; //this variable will hold the body for the table

if(mysqli_num_rows($result) > 0) {    
   foreach($rows as $row){
    $tbody .= "
    <tr> 
         <td>{$row['dishID']}</td>
        <td>{$row['name']}</td>
         <td><img class='img-thumbnail' src='" .$row['image']."'></td>
         <td><a href='details.php?id={$row['dishID']}' role='button' class='btn btn-warning'>Details</a></td>
    </tr>";
   }
}else{
   $tbody =  "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}

mysqli_close($connect);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meals</title>
    <?php include "components/boot.php"; ?>
    <link rel="stylesheet" href="components/Css/style.css">
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="read.php">Our meals</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
    <h3 class="text-center">our Menu</h3>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">image</th>
                    <th scope="col">Details</th>
                </tr>
            </thead>
            <tbody>
               <!-- <?php echo $tbody; ?> -->
               <?= $tbody; ?>
            </tbody>
        </table>
        <a href="index.php" type="button" role="button" class="btn btn-secondary">Back</a>
    </div>
    
</body>

</html>