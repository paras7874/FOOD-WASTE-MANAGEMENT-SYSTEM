<?php
include 'config/dbconnection.php';
include 'navbar.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: logins.php"); 
    exit;
  }

$_id = $_SESSION['user_id'];
$role = $_SESSION['user_role'];
if ($role == 'hotel') {
    $sql = "SELECT * FROM donations WHERE hotel_id = '$_id'";
    $sql_request = "SELECT * FROM food_requests WHERE hotel_id = '$_id'";

} elseif ($role == 'ngo') {
    $sql = "SELECT * FROM donations WHERE ngo_id = '$_id'";
    $sql_request = "SELECT * FROM food_requests WHERE ngo_id = '$_id'";

}

$result = mysqli_query($conn, $sql);
$result_request = mysqli_query($conn, $sql_request);
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
<div class="container mt-5 mb-5">
<h3 class="text-center mb-4">Welcome <?php echo $_SESSION['user_name']; ?>  Your  Donation History</h3>
<table class="table table-bordered table-striped text-center shadow-sm">
<thead class="table-info">
    <tr>
        <th>Food Names</th>
        <th>Quantity</th>
        <th>Description</th>
        <th>Expiry Date</th>
        <th>Status</th>
    </tr>
</thead>
<tbody>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['foodname'] ?></td>
            <td><?= $row['quantity'] ?></td>
            <td><?= $row['description'] ?></td>
            <td><?= $row['expirydate'] ?></td>
            <td><?= ucfirst($row['status']) ?></td>
        </tr>
    <?php } ?>
</tbody>
</table>
</div>


<div class="container mt-5 mb-5">
<h3 class="text-center mb-4">Welcome <?php echo $_SESSION['user_name']; ?>  Your  NGO Request History</h3>
<table class="table table-bordered table-striped text-center shadow-sm">
<thead class="table-info">
    <tr>
    <th>Food Names</th>
        <th>Quantity</th>
        <th>Message</th>
        <th>Expiry Date</th>
        <th>Status</th>
    </tr>
</thead>
<tbody>
    <?php while ($row = mysqli_fetch_assoc($result_request)) { ?>
        <tr>
        <td><?= $row['foodname']; ?></td>
        <td><?= $row['quantity']; ?></td>
        <td><?= $row['message']; ?></td>
        <td><?= $row['expirydate']; ?></td>
        <td><?= ucfirst($row['status']) ?></td>
        </tr>
    <?php } ?>
</tbody>
</table>
</div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>