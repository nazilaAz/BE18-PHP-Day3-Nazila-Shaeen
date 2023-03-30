<?php
session_start();

if (!isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
    header('Location:../login.php');
}
if (isset($_SESSION['user'])) {
    header('Location:../reservetable/booktable.php');
} else

require "db_connect.php";
require "../components/file_upload.php";

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['desciption'];

    $uploadError = '';
    $img = file_upload($_FILES['picture'], "menu");
    // echo "<pre>";
    // var_dump($_FILES['picture']);
    // echo "</pre>";
    $sql="INSERT INTO `dishes`(`picture`, `name`, `price`, `description`) VALUES ('$img->fileName','$name','$price','$desc')";

    if(mysqli_query($connect,$sql)=== true){
        $class = "success";
        $message = "The Entry was successfully created<br>
        <table class='table w-50'>
        <tr>
        <td>$name</td>
        <td>$price</td>
        <td>$desc</td>
        </tr>";
        $uploadError = ($img->error !=0)? $img->ErrorMessage :'';
    }else{
        $class ="danger";
        $message ="Error while creating record. Try again:<br>".$connect->error;
        $uploadError = ($img->error !=0)? $img->ErrorMessage:'';
    }

mysqli_close($connect);

}else{
    header("Location:../error.php");
}




