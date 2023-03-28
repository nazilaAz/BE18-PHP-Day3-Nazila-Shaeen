<?php
include_once "actions/db_connect.php";

$sql = "SELECT * FROM dishes";
$result = mysqli_query($connect, $sql);



$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

$tbody = ''; //this variable will hold the body for the table

if (mysqli_num_rows($result) > 0) {
    foreach ($rows as $row) {
        $tbody .= "
    <tr> 
         <td>{$row['dishID']}</td>
        <td>{$row['name']}</td>
         <td><img class='img-thumbnail' src='" . $row['image'] . "'></td>
         <td><a href='details.php?id={$row['dishID']}' role='button' class='btn btn-success'>Details</a></td>
         <td><a href='update.php?id={$row['dishID']}' role='button' class='btn btn-warning'>Update</a></td>
         <td><a href='delete.php?id={$row['dishID']}' role='button' class='btn btn-danger'>Delete</a></td>
    </tr>";
    }
} else {
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
    <link rel="stylesheet" href="components/Css/style.css">
    <?php include "components/boot.php"; ?>

</head>

<body>
<?php include_once "navbar.php";?>
    <div class="container">
        <h3 class="text-center">our Menu</h3>
        <a href="create.php" type="button" role="button" class="btn btn-light">
            Add new Product to List
        </a>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">image</th>
                    <th scope="col">Show Details</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <!-- <?php echo $tbody; ?> -->
                <?= $tbody; ?>
            </tbody>
        </table>
        <!-- <a href="index.php" type="button" role="button" class="btn btn-secondary">Back</a> -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>