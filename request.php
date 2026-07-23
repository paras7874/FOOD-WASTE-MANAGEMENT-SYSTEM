<?php

// session_start();
include 'config/dbconnection.php';
include 'navbar.php';
?>
<?php
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'ngo') {
  header("Location: logins.php"); 
  exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $foodname = $_POST['foodname'];
    $quantity = $_POST['quantity'];
    $message = $_POST['message'];
    $ngo_id = $_SESSION['user_id'];
    $expirydate=$_POST['expirydate'];
    $phone  = $_POST['phone'];
    $locations  = $_POST['locations'];
    $today = date('Y-m-d H:i');
    
    if ($expirydate <= $today) {
        echo '<div class="alert alert-danger shadow-sm "><h3 class="text-center mb-4">Expiry date must be after current date and time!</h3></div>';
    }
    else{

    $sql = "INSERT INTO food_requests (ngo_id, foodname, quantity, message,phone,locations,expirydate) VALUES ('$ngo_id', '$foodname', '$quantity', '$message','$phone','$locations','$expirydate')";
    if (mysqli_query($conn, $sql)) {
        echo '<div class="alert alert-info alert-dismissible fade show text-center" role="alert">';
        echo "<p> <strong><h3>Food Request Successfully send !</h3></strong></p>";
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
        //header("Location: request.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"></head>
    <style>
  .request-card {
    max-width: 600px;
    margin: auto;
  }
</style>
<body class="bg-light">
<div class="main-content">
    <div class="container mt-5 mb-5">
    <div class="card shadow p-4 request-card">
        <h3 class="text-center"> Foods Request</h3>
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
                <label>Message</label>
                <textarea name="message" class="form-control" ></textarea>
            </div>
            <div class="mb-3">
                <label>Phone</label>
                <!-- <input type="number" name="phone" class="form-control" required> -->
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
            
           
            <button type="submit" class="btn btn-success w-100">Request sent</button>
        </form>
       
    </div>
</div>
</div>


<?php include 'footer.php';?>
</body>
</html>
