<?php
include 'config/dbconnection.php';
include 'navbar.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: logins.php"); 
    exit;
  }
// Fetch total hotels
$sql_hotels = "SELECT COUNT(*) AS total_hotels FROM users WHERE role = 'hotel'";
$result_hotels = mysqli_query($conn, $sql_hotels);
$row_hotels = mysqli_fetch_assoc($result_hotels);

// Fetch total NGOs
$sql_ngos = "SELECT COUNT(*) AS total_ngos FROM users WHERE role = 'ngo'";
$result_ngos = mysqli_query($conn, $sql_ngos);
$row_ngos = mysqli_fetch_assoc($result_ngos);

// Fetch total donations
$sql_donations = "SELECT COUNT(*) AS total_donations FROM donations";
$result_donations = mysqli_query($conn, $sql_donations);
$row_donations = mysqli_fetch_assoc($result_donations);

// Fetch available donations
$sql_available = "SELECT COUNT(*) AS total_available FROM donations WHERE status='available'";
$result_available = mysqli_query($conn, $sql_available);
$row_available = mysqli_fetch_assoc($result_available);


// Fetch approved donations
$sql_approved = "SELECT COUNT(*) AS total_approved FROM donations WHERE status='approved'";
$result_approved = mysqli_query($conn, $sql_approved);
$row_approved = mysqli_fetch_assoc($result_approved);


// Fetch rejected donations
$sql_rejected = "SELECT COUNT(*) AS total_rejected FROM donations WHERE status='rejected'";
$result_rejected = mysqli_query($conn, $sql_rejected);
$row_rejected = mysqli_fetch_assoc($result_rejected);

// Fetch expired donations
$sql_expired = "SELECT COUNT(*) AS total_expired FROM donations WHERE status='expired'";
$result_expired = mysqli_query($conn, $sql_expired);
$row_expired = mysqli_fetch_assoc($result_expired);

// Fetch total request
$sql_request = "SELECT COUNT(*) AS total_request FROM food_requests";
$result_request = mysqli_query($conn, $sql_request);
$row_request = mysqli_fetch_assoc($result_request);

// Fetch avilable  request
$sql_av_request = "SELECT COUNT(*) AS total_av_request FROM food_requests WHERE status='pending'";
$result_av_request = mysqli_query($conn, $sql_av_request);
$row_av_request = mysqli_fetch_assoc($result_av_request);

// Fetch approved request
$sql_ap_request = "SELECT COUNT(*) AS total_ap_request FROM food_requests WHERE status='approved'";
$result_ap_request = mysqli_query($conn, $sql_ap_request);
$row_ap_request = mysqli_fetch_assoc($result_ap_request);

// Fetch rejected request
$sql_r_request = "SELECT COUNT(*) AS total_r_request FROM food_requests WHERE status='rejected'";
$result_r_request = mysqli_query($conn, $sql_r_request);
$row_r_request = mysqli_fetch_assoc($result_r_request);

// Fetch expired request
$sql_ex_request = "SELECT COUNT(*) AS total_ex_request FROM food_requests WHERE status='expired'";
$result_ex_request = mysqli_query($conn, $sql_ex_request);
$row_ex_request= mysqli_fetch_assoc($result_ex_request);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="mycss/main.css">

  <style>
    body { background-color: #f8f9fa; }
    .card {
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transition: 0.3s;
    }
    .card:hover { transform: scale(1.05); }
    .nice{
      background-color:  rgb(147, 35, 252);
    }
    .av{
      background-color: rgb(123, 243, 3)
    }
    .ap{
      background-color:  rgb(252, 74, 10)
    }
    .total{
      background-color: rgb(47, 47, 255)
    }
    .ex{
      background-color: rgb(11, 246, 203)
    }
    .expiry{
      background-color: rgb(247, 12, 129)
    }
    
  </style>
</head>
<body>
<div class="main-content">
<div class="container mt-5 mb-5">
  <h3 class="text-center mb-4">📊 Food Waste Management System Dashboard</h3>
  <div class="row g-4 text-center">
    <div class="col-md-4">
      <div class="card bg-primary text-white p-3">
        <h5>Total Hotels</h5>
        <h2><?= $row_hotels['total_hotels']; ?></h2>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card bg-success text-white p-3">
        <h5>Total NGOs</h5>
        <h2><?= $row_ngos['total_ngos']; ?></h2>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card bg-warning text-white p-3">
        <h5>Total Donations</h5>
        <h2><?= $row_donations['total_donations']; ?></h2>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card bg-info text-white p-3">
        <h5>Available Donations</h5>
        <h2><?= $row_available['total_available']; ?></h2>
      </div>
    </div>
  
  
  <div class="col-md-4">
      <div class="card nice text-white p-3">
        <h5>Approved Donations</h5>
        <h2><?= $row_approved['total_approved']; ?></h2>
      </div>
    </div>
  
  
  <div class="col-md-4">
      <div class="card bg-danger text-white p-3">
        <h5>Rejected Donations</h5>
        <h2><?= $row_rejected['total_rejected']; ?></h2>
      </div>
    </div>
  

  <div class="col-md-4">
      <div class="card expiry text-white p-3">
        <h5>Expired Donations</h5>
        <h2><?= $row_expired['total_expired']; ?></h2>
      </div>
    </div>
  

  <div class="col-md-4">
      <div class="card total text-white p-3">
        <h5>Total Requests</h5>
        <h2><?= $row_request['total_request']; ?></h2>
      </div>
    </div>
 

  <div class="col-md-4">
      <div class="card av text-white p-3">
        <h5>Available Requests</h5>
        <h2><?= $row_av_request['total_av_request']; ?></h2>
      </div>
    </div>
  
    <div class="col-md-4">
      <div class="card ap text-white p-3">
        <h5>Approved Requests</h5>
        <h2><?= $row_ap_request['total_ap_request']; ?></h2>
      </div>
    </div>
  
    
    <div class="col-md-4">
      <div class="card bg-danger text-white p-3">
        <h5>Rejected Requests</h5>
        <h2><?= $row_r_request['total_r_request']; ?></h2>
      </div>
    </div>


    <div class="col-md-4">
      <div class="card ex text-white p-3">
        <h5>Expired Requests</h5>
        <h2><?= $row_ex_request['total_ex_request']; ?></h2>
      </div>
    </div>
  


  </div>
</div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>

