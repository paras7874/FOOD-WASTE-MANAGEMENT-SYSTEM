
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Waste Management system</title>
    <link rel="stylesheet" href="\bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="mycss\main.css">
    <style>
   
/* Login Card */
.card {
    width: 400px; /* increase width */
    max-width: 100%; /* make it responsive */
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
  }
  
  
  /* Login Button */
  .btn-primary {
    background: linear-gradient(135deg, #0072ff, #00c6ff);
    border: none;
    padding: 12px;
    font-size: 18px;
    font-weight: 600;
    border-radius: 8px;
    transition: 0.3s ease-in-out;
  }
  
  .btn-primary:hover {
    background: linear-gradient(135deg, #00c6ff, #0072ff);
    transform: scale(1.05);
  }
  
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
<div class="main-content">

    <section class="hero d-flex align-items-center text-center text-white bg-secondary" style="height:60vh;">
        <div class="container">
            <h1 class="display-5">Welcome to Food Waste Management System</h1>
            <p class="lead">Connecting Donors, NGOs, and Communities to fight hunger and reduce food waste</p>
            <a href="logins.php" class="btn btn-primary me-2">Join Us</a>
        </div>
    </section>
    <div class="container text-center my-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card p-3 shadow-sm role-box ">
                    <h5> 🍽️ Donors</h5>
                    <p>Restaurants and individuals can donate surplus food easily.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3 shadow-sm role-box">
                    <h5> 🤝 NGOs</h5>
                    <p>NGOs and volunteers can request and distribute food to the needy.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3 shadow-sm role-box">
                    <h5> 🛠️ Admin</h5>
                    <p>Admin ensures transparency and manages all activities.</p>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php include 'footer.php'; ?>
</body>
</html>
