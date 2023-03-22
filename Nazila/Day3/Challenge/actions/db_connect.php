<?php
$hostname="127.0.0.1";
$username="root";
$password="";
$dbname="restaurant";

$connect=new mysqli($hostname,$username,$password,$dbname);

if(!$connect){
die("The Connection faild ". mysqli_connect_errno());
}
