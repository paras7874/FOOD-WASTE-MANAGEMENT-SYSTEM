<?php
include '../config/dbconnection.php';
include 'navbar.php';
// session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email = $_POST['email'];
    $password=$_POST['password'];
    
    $sql="SELECT * FROM users WHERE email=?";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $result=$stmt->get_result();
    if($result->num_rows==1){
        $user=$result->fetch_assoc();
        if(password_verify($password,$user['password'])){
            // store session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role'];
            $_SESSION['user_name']= $user['name'];
            header("Location: dashboard.php");
            exit;

        }else{
            echo '<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">';
            echo "<p> <strong><h3>Wrong Password!</h3></strong></p>";
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
        }

    }
    else{
        echo '<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">';
        echo "<p> <strong><h3>User Not Found!!</h3></strong></p>";
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
    }

}

?>









<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Waste Management system</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" >    <style>
     /* Login & Signup Card */
  .login-card, .signup-card {
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

<body class="bg-light">
<div class="main-content">
    <div class="d-flex justify-content-center align-items-center vh-100 bg-light">
        <div class="login-card shadow p-4 bg-white rounded">
            <h4 class="text-center mb-4">Login</h4>
            <form  method="post">
                
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="Enter Your Email" name="email" required>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Enter Your password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-3">Login</button>
    
            </form>
            <p class="text-center mt-3">Don't have an account? <a href="signups.php">Sign up</a></p>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
