<?php
session_start();


if (isset($_SESSION['admin'])) {
    header('Location:../../dashboar.php');
} elseif (!isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
    header('Location:../../login.php');
}

require "../actions/db_connect.php";
require "../components/file_upload.php";


if(isset($_POST['book'])){
$name=$_POST['name'];
$price=$_POST['price'];
$desc = $_POST['desciption'];
$img= $_FILES['image'];
echo "<pre>";
var_dump($_FILES['image']);
echo "</pre>";

}



// mysqli_close($connect);
