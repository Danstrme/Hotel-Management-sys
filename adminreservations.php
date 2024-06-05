<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservations</title>
  <link rel="stylesheet" href="adminreservation.css">
</head>
<body>
  <div class="container">
    <nav class="navbar">
      <div class="navbar-brand">
        <img src="img/celestial.png" alt="Logo" class="logo" />
        <span class="brand-name">Celestial Hotel</span>
      </div>
      <div class="navbar-links">
        <a href="admindash.php">Dashboard</a>
        <a href="#">Reservation</a>
        <a href="#">Rooms</a>
        <a href="#">Calendar</a>
        <a href="#">Logout</a>
      </div>
    </nav>
    <div class="content">
      <h1 class="title">Reservation</h1>
      
      <!-- Search Form -->
      <form method="GET" action="" class="search-form">
        <input type="text" name="search" placeholder="Search by Last Name or Email" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
        <button type="submit">Search</button>
      </form>

      <div class="table-container">
        <table class="table">
          <thead>
            <tr>
              <th>Reserve ID</th>
              <th>User ID</th>
              <th>Reg ID</th>
              <th>Arrival Date</th>
              <th>Days Stay</th>
              <th>Number of Rooms</th>
              <th>Number of Adults</th>
              <th>Number of Childrens</th>
              <th>Type of Room</th>
              <th>Total Payment</th>
              <th>Cancel Request</th>
              <th>Room Status</th>
              <th>Room Number</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $servername = "localhost";
              $username = "root";
              $password = "";
              $database = "hotelcelestial";

              $conn = new mysqli($servername, $username, $password, $database);

              if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
              }

              $search = isset($_GET['search']) ? $_GET['search'] : '';
              $sql = "SELECT * FROM reservation_details";
              if ($search) {
                  $sql .= " WHERE reg_id LIKE '%$search%' OR room_type LIKE '%$search%' OR total_payment LIKE '%$search%'";
              }
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>" . $row["reserve_id"] . "</td>";
                      echo "<td>" . $row["user_id"] . "</td>";
                      echo "<td>" . $row["reg_id"] . "</td>";
                      echo "<td>" . $row["arrival_date"] . "</td>";
                      echo "<td>" . $row["days_stay"] . "</td>";
                      echo "<td>" . $row["num_rooms"] . "</td>";
                      echo "<td>" . $row["num_adults"] . "</td>";
                      echo "<td>" . $row["num_childs"] . "</td>";
                      echo "<td>" . $row["room_type"] . "</td>";
                      echo "<td>₱ " . number_format($row["total_payment"], 2) . "</td>";
                      echo "<td><button class='status-button'>Pending</button></td>";
                      echo "<td><select class='select'><option>Pending</option><option>Check In</option><option>Check Out</option><option>Failed</option></select></td>";
                      echo "<td><select class='select'><option>ROOM 1</option><option>ROOM 2</option><option>ROOM 3</option><option>ROOM 4</option></select></td>";
                      echo "<td><button class='action-button update'>Update</button><button class='action-button delete'>Delete</button></td>";
                      echo "</tr>";
                  }
              } else {
                  echo "<tr><td colspan='13'>No reservations found</td></tr>";
              }

              $conn->close();
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
