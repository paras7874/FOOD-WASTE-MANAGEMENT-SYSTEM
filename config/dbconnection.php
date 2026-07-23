<?php


//Database connection file

$host='localhost';
$username='';
$password='';
$dbname='';

//create connection

$conn = new mysqli(
    $host,
    $username,
    $password,
    $dbname
);

if($conn->connect_error){
    die("connection failed" . $conn->connect_error);
}
// echo "Connected successfully";
?>
