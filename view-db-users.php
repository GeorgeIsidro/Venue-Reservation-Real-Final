<!DOCTYPE html>
<html>

<head>
  <title>View Venue Reservations</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  

</head>

<body>
  <div class="container">
    <h1 align = "center">View Venue Reservations</h1>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Reservation ID</th>
          <th>Venue Name</th>
          <th>Purpose</th>
          <th>Reservation Date</th>
          <th>Start Time</th>
          <th>End Time</th>
		  <th>Grace Period</th>
		  <th>Contact Person</th>
		  <th>Email</th>
		  <th>Sector</th>
		  <th>Date Reserved</th>
          <!-- Add more columns if needed -->
        </tr>
      </thead>
      <tbody>
        <?php
        // Replace 'your_database_name', 'your_database_username', and 'your_database_password'
        $databaseName = 'databasendgm';
        $databaseUsername = 'root';
        $databasePassword = '';

        try {
          // Connect to the database
          $pdo = new PDO("mysql:host=localhost;dbname=$databaseName", $databaseUsername, $databasePassword);

          // Set the PDO error mode to exception
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          // Fetch the reservations from the database
          $query = "SELECT * FROM reservations"; // Replace 'reservations' with your actual table name
          $statement = $pdo->prepare($query);
          $statement->execute();

          // Fetch all rows as an associative array
          $reservations = $statement->fetchAll(PDO::FETCH_ASSOC);

		
			if (!empty($reservations)) {
           
          // Display the reservations
          foreach ($reservations as $reservation) {
            echo '<tr>';
			echo '<td>' . $reservation['id'] . '</td>';
			echo '<td>' . $reservation['venue_name'] . '</td>';
			echo '<td>' . $reservation['purpose'] . '</td>';
			echo '<td>' . $reservation['reservation_date'] . '</td>';
			echo '<td>' . date('g:i A', strtotime($reservation['start_time'])) . '</td>'; // Display start time in 12-hour format
			echo '<td>' . date('g:i A', strtotime($reservation['end_time'])) . '</td>';   // Display end time in 12-hour format
			echo '<td>' . $reservation['grace_period'] . '</td>';
			echo '<td>' . $reservation['contact_person'] . '</td>';
			echo '<td>' . $reservation['email'] . '</td>';
			echo '<td>' . $reservation['sector'] . '</td>';
			echo '<td>' . $reservation['date_reserved'] . '</td>';
            // Add more columns if needed
            echo '</tr>';
          }
			}
        } catch (PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
          die();
        }
        ?>
      </tbody>
    </table>
	    <a href="navbar-practice.html" class="btn btn-secondary">Back</a>

  </div>
</body>

</html>
