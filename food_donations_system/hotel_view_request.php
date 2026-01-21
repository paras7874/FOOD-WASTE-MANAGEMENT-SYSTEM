<?php

// session_start();
include '../config/dbconnection.php';
include 'navbar.php';
?>

<?php
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'hotel') {
  header("Location: logins.php"); 
  exit;
}
$result =$conn->query("SELECT f.*, u.name FROM food_requests f JOIN users u ON f.ngo_id=u.id WHERE f.status='pending'");
if (mysqli_num_rows($result) > 0):
?>
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
<div class="text-center mt-4 mb-5"><h1>Available Request</h1></div>
<div class="table-responsive">
  <table class="table table-bordered table-striped text-center align-middle mt-4">
  <thead class="table-info">
  <tr>
  <th>id</th>
  <th>NGO</th>
  <th>foodname</th>
  <th>quantity</th>
  <th>Message</th>
  <th>phone</th> 
  <th>locations</th>
  <th>expirydate</th>
  <th>Action</th>
  </tr>
  </thead>
  <tbody>
  <?php while($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $row['id']; ?></td>
      <td><?= $row['name']; ?></td>
      <td><?= $row['foodname']; ?></td>
      <td><?= $row['quantity']; ?></td>
      <td><?= $row['message']; ?></td>
      <td><?= $row['phone']; ?></td>
      <td><?= $row['locations']; ?></td>
      <td><?= $row['expirydate']; ?></td>
      <td>
        <button class="btn btn-success "><a style="text-decoration: none; color:white;" href="request_approve.php?id=<?= $row['id']; ?>" onclick="return confirmAction('approve')">Approve</a></button> 
        <button class="btn btn-danger "><a style="text-decoration: none; color:white;" href="request_reject.php?id=<?= $row['id']; ?>"onclick="return confirmAction('reject')">Reject</a></button> 

      </td>
    </tr>
  <?php endwhile; ?>
  </tbody>
</table>
<?php else: ?>
      <div class="alert alert-success mt-4 shadow-sm"> <h3 class="text-center mb-4">Welcome User <?php echo $_SESSION['user_name']; ?></h3></div>

        <div class="alert alert-info mt-3 text-center shadow-sm"> <h3 class="text-center mb-4">No food request available right now. </h3></div>
<?php endif; ?>
</div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>

<script>
function confirmAction(action) {
    return confirm("Are you sure you want to " + action + " this request?");
}
</script>