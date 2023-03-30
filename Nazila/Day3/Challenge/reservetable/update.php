<?php
session_start();

if (isset($_SESSION['admin'])) {
    header('Location:../dashboar.php');
} elseif (!isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
    header('Location:../login.php');
}
require_once "../actions/db_connect.php";
?>