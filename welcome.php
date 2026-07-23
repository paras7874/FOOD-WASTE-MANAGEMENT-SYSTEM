<?php

session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: signups.php");
    exit;
}


?>

<html>

<head>
    <title>welcome</title>
</head>
<body>
    <h1>welcome <?=$_SESSION['user_name']; ?></h1>
    <a href="logout.php">Logout</a>
    <!-- <a href="../categories/index.php">show categories</a> -->
</body>
</html>
