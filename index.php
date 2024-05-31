<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Ticket Booking</title>
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
    <main>
        <section class="booking-form">
            <form action="results.php" method="get">
                <div class="form-group">
                    <label for="from">From</label>
                    <input type="text" id="from" name="from" placeholder="City or station">
                    <div id="from-suggestions" class="autocomplete-suggestions"></div>
                </div>
                <div class="form-group">
                    <label for="to">To</label>
                    <input type="text" id="to" name="to" placeholder="City or station">
                    <div id="to-suggestions" class="autocomplete-suggestions"></div>
                </div>
                <div class="form-group">
                    <label for="date">Out</label>
                    <input type="datetime-local" id="date" name="date">
                </div>
               
                <div class="form-group">
                    <label for="passengers">Passengers</label>
                    <input type="number" id="passengers" name="passengers" value="1" min="1">
                </div>
                
                
                
                <button type="submit">Get cheapest tickets</button>
                

            </form>
        </section>
        <section class="hero">
            <h1>Explore Turkey effortlessly by train !</h1>
            <p>Save 61% on average when you book in advance*</p>
        </section>
    </main>

    <script src="js/script.js"></script>
</body>
</html>
