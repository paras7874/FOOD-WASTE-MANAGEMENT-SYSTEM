<?php
include 'config/dbconnection.php';
include 'navbar.php';
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'hotel') {
    header("Location: logins.php"); 
    exit;
  }
$hotel_id = $_SESSION['user_id'];
$today = date('Y-m-d');
?>
<?php
$conn->query("UPDATE donations  SET status = 'expired'  WHERE expirydate  < NOW() AND status='available' ");
?>
<?php
$result = $conn->query("SELECT dr.* , u.name , u.email, u.phone FROM donations dr LEFT JOIN users u ON dr.ngo_id = u.id WHERE dr.hotel_id='$hotel_id' ORDER BY created_at DESC");

?>

<?php

$sql_expiry = "SELECT foodname, expirydate FROM donations   WHERE hotel_id='$hotel_id'  AND DATEDIFF(expirydate, '$today') <= 1  AND status='available' ";

$result_expiry = mysqli_query($conn, $sql_expiry);
?>
<!-- <div class="alert alert-warning mt-3 text-center">
  <h5>Food Expiry Reminder</h5> -->
  <?php
  

  if (mysqli_num_rows($result_expiry) > 0) {
      echo '<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">';
      echo '<h5>Food Expiry Reminder</h5>';
      echo '<h5>⚠️ These food items are expiring soon:</h5>';
      
      while ($row = mysqli_fetch_assoc($result_expiry)) {
          echo "<p> <strong>{$row['foodname']}</strong> — expires on <strong>{$row['expirydate']}</strong></p>";
          echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
      }
      
      echo '</div>';
   } 
  //else {
  //     echo '<div class="alert alert-success text-center shadow-sm">✅ No food items are near expiry today.</div>';
  // }
  ?>
</div>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Donation & Waste Reduction System</title>
    <link rel="stylesheet" href="\css\bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="mycss\main.css">
    </head>
    <body>
   
<div class="main-content">
<div class="container mt-5 mb-5">
  <h3 class="text-center mb-4">Welcome  <?php echo $_SESSION['user_name']; ?> Your Donated Foods</h3>
  
    <a href="donates.php" class="btn btn-outline-success btn-lg">Add New Donation</a>
  
    <table class="table table-bordered table-striped text-center shadow-sm mt-2">
    <thead class="table-success">
      <tr>
        <th>Donate ID</th>
        <th>Food Names</th>
        <th>Quantity</th>
        <th>Description</th>
        <th>created Date</th>
        <th>Expiry Date</th>
        <th>Status</th>
        <th>NGO Name </th>  
        <th>NGO Email</th>
        <th>NGO Contact No</th>
      </tr>
    </thead>
    <tbody>
    <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['foodname']; ?></td>
                <td><?= $row['quantity']; ?></td>
                <td><?= $row['description']; ?></td> 
                <td><?= $row['created_at']; ?></td> 
                <td><?= $row['expirydate']; ?></td>
                <td><?= ucfirst($row['status']); ?></td>
                <td><?= $row['name']; ?></td>
                <td><?= $row['email']; ?></td>
                <td> <?= $row['phone']; ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
  </table>
</div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>