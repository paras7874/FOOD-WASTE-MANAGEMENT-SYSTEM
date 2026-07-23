<?php
session_start();
include 'config/dbconnection.php';
if(!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'ngo'){
   header("Location: logins.php");
   exit;
}
$id = $_GET['id'];
$ngo_id = $_SESSION['user_id'];

$conn->query("UPDATE donations SET status='rejected', ngo_id=$ngo_id  WHERE id=$id");
header("Location: ngo_dashboard.php");
?>
