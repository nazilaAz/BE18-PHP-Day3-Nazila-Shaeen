<?php
include "db_connect.php";

if($_POST){
$name=$_POST['name'];
$price=$_POST['price'];
$desc = $_POST['desciption'];
$img= $_FILES['image'];
echo "<pre>";
var_dump($_FILES['image']);
echo "</pre>";

}



// mysqli_close($connect);
