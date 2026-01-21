<?php
session_start();
 include '../config/dbconnection.php';
 if(!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'ngo'){
    header("Location: logins.php");
    exit;
}
$ngo_id = $_SESSION['user_id'];
$id = $_GET['id'];
$conn->query("UPDATE donations SET status='approved',ngo_id=$ngo_id  WHERE id=$id");
header("Location: ngo_dashboard.php");
?>
