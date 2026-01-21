<?php
 include '../config/dbconnection.php';

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];
    $sql = "INSERT INTO users (name, email,phone, password, role) 
    VALUES ('$name', '$email','$phone', '$password', '$role')";

if (mysqli_query($conn, $sql)) {
    header("Location: logins.php");
} else {
echo "Error: " . mysqli_error($conn);
}
}

?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Food Waste Management system</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
  /* Login & Signup Card */
  .login-card,
  .signup-card {
    max-width: 400px;
    width: 100%;
    border-radius: 12px;
  }

  .btn-teal {
    background-color: #00b894;
    color: white;
    font-weight: 500;
    padding: 10px;
    border-radius: 8px;
    transition: 0.3s;
  }

  .btn-teal:hover {
    background-color: #019170;
    color: white;
  }

  .btn-purple {
    background-color: #6c5ce7;
    color: white;
    font-weight: 500;
    padding: 10px;
    border-radius: 8px;
    transition: 0.3s;
  }

  .btn-purple:hover {
    background-color: #5a4ccf;
    color: white;
  }

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

<body>
   <?php include 'navbar.php';?> 
  <div class="main-content">
    <div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="signup-card shadow p-4 bg-white rounded">
      <h4 class="text-center mb-4">Create Account</h4>
      <form method="post">

        <div class="mb-3">
          <label>Username</label>
          <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
          <label>Mobile No</label>
          <input type="tel"  name="phone"  pattern="[0-9]{10}"  maxlength="10"  required  class="form-control">
        </div>
        <div class="mb-3">
          <label>Email</label>
          <input type="email" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
          <label>Password</label>
          <input type="password" class="form-control" name="password" required>
        </div>
        
        <div class="mb-3">
        <label for=""> Role</label>
        <select name="role" class="form-select" required>
        <option value="">Select Role</option>
          <option value="hotel">Hotel</option>
          <option value="ngo">NGO</option>
        </select>    
        </div>
        <button type="submit" class="btn btn-primary w-100" >Sign Up</button>
      </form>
      <p class="text-center mt-3">Already have an account? <a href="logins.php">Login</a></p>
    </div>
  </div>
</div>
<?php include 'footer.php';?> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
