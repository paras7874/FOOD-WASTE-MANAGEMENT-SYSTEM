<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Food Waste Management system</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="mycss/main.css">
  <style>
        html, body {
            height: 100%;
            margin: 0;
            
        }
        body {
            display: flex;
            flex-direction: column;
        }
        .main-content {
            flex: 1;
        }
        footer {
            background: #000;
            color: #fff;
            text-align: center;
            padding: 12px 0;
            margin-top: auto;
        }
        
    </style>
</head>
<body>
<!-- nav start -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="about.php">Food Waste Management System</a>           
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-light" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-light"  href="about.php">About</a></li>
                            <!-- this is for only hotel user access paticluar page ok -->
                            
                        <?php if(isset($_SESSION['user_id'])): ?>
                            <?php if($_SESSION['user_role'] == 'hotel'): ?>
                            <li class="nav-item"><a class="nav-link text-light" href="donates.php">Donate</a></li>
                            <li class="nav-item"><a class="nav-link text-light" href="hotel_dashboard.php">Hotel Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link text-light" href="history.php">History</a></li>
                            <li class="nav-item"><a class="nav-link text-light" href="dashboard.php">Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link text-light" href="hotel_view_request.php">Request</a></li>
                            <!-- this is for only ngo user access paticluar page ok -->


                            <?php elseif($_SESSION['user_role'] == 'ngo'): ?>
                            <li class="nav-item"><a class="nav-link text-light" href="ngo_dashboard.php">NGO Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link text-light" href="history.php">History</a></li>
                            <li class="nav-item"><a class="nav-link text-light" href="dashboard.php">Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link text-light" href="request.php">Request</a></li>
                            <li class="nav-item"><a class="nav-link text-light" href="request_dashboard.php">Request Dashboard</a></li>




                            <?php endif; ?>
                            <li class="nav-item"><a class="nav-link text-danger" href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link text-light" href="signups.php">Sign Up</a></li>
                        <li class="nav-item"><a class="nav-link text-light" href="logins.php">Login</a></li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>