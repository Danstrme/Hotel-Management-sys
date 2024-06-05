<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="admindash.css">
</head>
<body>
  <nav class="navbar">
    <div class="container navbar-container">
      <div class="navbar-brand">Celestial</div>
      <div class="navbar-links">
        <a href="admindash.php" class="navbar-link">Dashboard</a>
        <a href="adminreservations.php" class="navbar-link">Reservation</a>
        <a href="#" class="navbar-link">Rooms</a>
        <a href="#" class="navbar-link">Calendar</a>
        <a href="#" class="navbar-link">Logout</a>
      </div>
    </div>
  </nav>
  <div class="container main-content">
    <h1 class="title">Admin Dashboard</h1>
    <div class="grid">
    <a href="adminreservations.php" class="card">
        <div class="card-icon">
          <img src="https://placehold.co/50x50" alt="Reservation Icon">
        </div>
        <?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "hotelcelestial";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT COUNT(*) AS total_reservations FROM reservation_details";
$result = $conn->query($sql);

$total_reservations = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_reservations = $row['total_reservations'];
}

$conn->close();
?>
        <div class="card-text">
          <p class="card-number"><?php echo $total_reservations; ?></p>
          <p>Total Reservation</p>
        </div>
      </a>
      <a href="adminreservations.php" class="card">
        <div class="card-icon">
          <img src="https://placehold.co/50x50" alt="Standard Room Icon">
        </div>
        <div class="card-text">
          <p class="card-number">10</p>
          <p>Standard Room</p>
        </div>
      </a>
      <a class="card">
        <div class="card-icon">
          <img src="https://placehold.co/50x50" alt="Double Room Icon">
        </div>
        <div class="card-text">
          <p class="card-number">8</p>
          <p>Double Room</p>
        </div>
</a>
      <a class="card">
        <div class="card-icon">
          <img src="https://placehold.co/50x50" alt="Suite Room Icon">
        </div>
        <div class="card-text">
          <p class="card-number">5</p>
          <p>Suite Room</p>
        </div>
      </a>
      <a class="card">
        <div class="card-icon">
          <img src="https://placehold.co/50x50" alt="Deluxe Room Icon">
        </div>
        <div class="card-text">
          <p class="card-number">2</p>
          <p>Deluxe Room</p>
        </div>
      </a>
      <a class="card">
        <div class="card-icon">
          <img src="https://placehold.co/50x50" alt="Cancel Reservation Icon">
        </div>
        <div class="card-text">
          <p class="card-number">3</p>
          <p>Cancel Reservation</p>
        </div>
      </a>
      <a href="adminusers.php" class="card">
        <div class="card-icon">
          <img src="https://placehold.co/50x50" alt="Registered Users Icon">
        </div>
        <?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "hotelcelestial";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT COUNT(*) AS total_registration FROM user_registration";
$result = $conn->query($sql);

$total_reservations = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_reservations = $row['total_registration'];
}

$conn->close();
?>
        <div class="card-text">
        <p class="card-number"><?php echo $total_reservations; ?></p>
          <p>Registered Users</p>
        </div>
      </a>
    </div>
  </div>
</body>
</html>
