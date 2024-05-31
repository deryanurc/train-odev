<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results - Train Ticket Booking</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="img/logo.png" alt="Trainline Logo">
        </div>
        <nav>
            <ul>
                <li><a href="#">Basket</a></li>
                <li><a href="#">My Bookings</a></li>
                <li><a href="#">Register</a></li>
                <li><a href="#">Sign In</a></li>
            </ul>
        </nav>
    </header>
    <main id="results">
        <section class="search-summary">
            <div class="city-info">
                <?php
                $from = $_GET['from'];
                $to = $_GET['to'];
                $date = $_GET['date'];
                $passengers = $_GET['passengers'];
                echo "<span id='from-city'>$from</span> ↔ <span id='to-city'>$to</span>";
                ?>
            </div>
            <div class="date-info">
                <?php
                echo "<span id='travel-date'>$date</span>";
                ?>
            </div>
            <div class="passenger-info">
                <?php
                echo "<span id='passenger-count'>$passengers passengers</span>";
                ?>
            </div>
        </section>
        <section class="results">
            <h2>Available Journeys</h2>
            <div id="journeys">
                <?php
                $conn = new mysqli('localhost', 'root', '', 'train_booking');
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM journeys WHERE from_city='$from' AND to_city='$to' AND DATE(date)='$date'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='journey'>";
                        echo "<span>{$row['from_city']} to {$row['to_city']}</span>";
                        echo "<span>Date: {$row['date']}</span>";
                        echo "<span>Time: {$row['time']}</span>";
                        echo "<span>Price: \${$row['price']}</span>";
                        echo "</div>";
                    }
                } else {
                    echo "No journeys found.";
                }

                $conn->close();
                ?>
            </div>
        </section>
    </main>
</body>
</html>
