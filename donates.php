<?php
// session_start();
include 'navbar.php';
include 'config/dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $foodname = $_POST['foodname'];
    $quantity  = $_POST['quantity'];
    $description  = $_POST['description'];
    $phone  = $_POST['phone'];
    $locations  = $_POST['locations'];
    $expirydate=$_POST['expirydate'];
    $hotel_id = $_SESSION['user_id'];
    $today = date('Y-m-d H:i');
    
    if ($expirydate <= $today) {
        echo '<div class="alert alert-danger shadow-sm "><h3 class="text-center mb-4">Expiry date must be after current date and time!</h3></div>';
    }
    else{

    $sql = "INSERT INTO donations (hotel_id, foodname, quantity,description,phone,locations,expirydate) 
            VALUES ('$hotel_id', '$foodname', '$quantity','$description','$phone','$locations','$expirydate')";

    if (mysqli_query($conn, $sql)) {
            echo '<div class="alert alert-info alert-dismissible fade show text-center" role="alert">';
            echo "<p> <strong><h3>Food Donate Successfully send !</h3></strong></p>";
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
        // header("Location: donates.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Donate Food</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
  .request-card {
    max-width: 600px;
    margin: auto;
  }
</style>
<body class="bg-light">
<div class="main-content">
    <div class="container mt-5 mb-5 request-card">
    <div class="card shadow p-4">
        <h3 class="text-center"> Donate Foods</h3>
        <form method="post">
            <div class="mb-3">
                <label>Food Names</label>
                <input type="text" name="foodname" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Quantity</label>
                <input type="text" name="quantity" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control" ></textarea>
            </div>
            <div class="mb-3">
                <label>Phone</label>
                <input type="tel"  name="phone"  pattern="[0-9]{10}"  maxlength="10"  required  class="form-control">
            </div>
            <div class="mb-3">
                <label>Locations</label>
                <textarea name="locations" id="" class="form-control" required></textarea>
            </div>
            
            <div class="mb-3">
                <label>Expiry Date</label>
                <input type="datetime-local" name="expirydate" class="form-control" required>
            </div>
            
           
            <button type="submit" class="btn btn-success w-100">Donate</button>
        </form>
       
    </div>
</div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>