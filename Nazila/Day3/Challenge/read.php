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
         <td><img class='img-thumbnail' src='" .$row['image']."'</td>
         <td><button type='button' class='btn btn-warning'>Details</button></td>
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
    <div class="container">
        <table class="table table-striped table-primary">
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
    </div>
</body>

</html>