<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registered Users</title>
  <link rel="stylesheet" href="adminusers.css">
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
        <a href="adminreservations.php">Reservation</a>
        <a href="#">Rooms</a>
        <a href="#">Calendar</a>
        <a href="#">Logout</a>
      </div>
    </nav>
    <div class="content">
      <h1 class="title">registered Users</h1>
      
      <!-- Search Form -->
      <form method="GET" action="" class="search-form">
        <input type="text" name="search" placeholder="Search by Last Name or Email" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
        <button type="submit">Search</button>
      </form>

      <div class="table-container">
        <table class="table">
          <thead>
            <tr>
              <th>Registration ID</th>
              <th>Last Name</th>
              <th>First Name</th>
              <th>Middle Name</th>
              <th>Extension Name</th>
              <th>Contact Number</th>
              <th>Email Address</th>
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
              $sql = "SELECT * FROM user_registration";
              if ($search) {
                  $sql .= " WHERE reg_id LIKE '%$search%' OR lastname LIKE '%$search%' OR firstname LIKE '%$search%'";
              }
              $result = $conn->query($sql);



// reg_id	
// lastname	
// firstname	
// middlename	
// extensionname	
// contact_num	
// email	
// password


              if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>" . $row["reg_id"] . "</td>";
                      echo "<td>" . $row["lastname"] . "</td>";
                      echo "<td>" . $row["firstname"] . "</td>";
                      echo "<td>" . $row["middlename"] . "</td>";
                      echo "<td>" . $row["extensionname"] . "</td>";
                      echo "<td>" . $row["contact_num"] . "</td>";
                      echo "<td>" . $row["email"] . "</td>";
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
