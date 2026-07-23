<?php
session_start();
 include 'config/dbconnection.php';
 if(!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'hotel'){
    header("Location: logins.php");
    exit;
}
$hotel_id = $_SESSION['user_id'];
$id = $_GET['id'];
$conn->query("UPDATE food_requests SET status='rejected',hotel_id=$hotel_id  WHERE id=$id");
header("Location: hotel_view_request.php");
?>
