<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Search for a Caregiver</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
        <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
        <!-- Include Leaflet CSS and JS files -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    </head>
<body>
    <!--- database connection --->
    <?php
        // Create connection
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $mysqli = new mysqli('localhost', 'root', '', 'carepal');

        // Check connection
        $mysqli->set_charset('utf8mb4');

        printf("Success... %s\n", $mysqli->host_info);
    ?>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.html"><img src="img/logo.png" width="30" height="30"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Map.php">Map</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Schedule%20Interview.php">Schedule an Interview</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Contact%20Us.php">Contact Us</a>
            </li>
        </ul>
        </div>
    </div>
</nav>
<!-- Create a div to hold the map -->
<div class="container-fluid pt-5">
    <div class="row">
        <div class="col-lg-6"><div id="map" style="height: 500px"></div></div>
        <!--- caregiver information panel --->
        <div class="col-lg-6">
            <div class="input-group pb-3">
                <input type="text" id="address" placeholder="Enter an address">
                <!-- Button to trigger conversion -->
                <button onclick="getCoordinates()">Get Coordinates</button>
                <!-- Container for displaying coordinates -->
                <div id="coordinates"></div>
            </div>
            <div class="accordion" id="caregiver_list">
                <?php
                    $query = "Select * FROM caregiver";
                    $result = mysqli_query($mysqli, $query);
                    $i = 0;
                
                    while($row = mysqli_fetch_array($result)) { ?>
                    <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="<?php echo '#collapse'.$i;?>" aria-expanded="false" aria-controls="<?php echo 'collapse'.$i;?>">
                            <?php echo $row['first_name']." ".$row['last_name'];?>
                        </button>
                    </h2>
                    <div id="<?php echo 'collapse'.$i;?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                    <div class="row align-items-center">
                        <div class="col-lg-10">
                            <strong>Address: </strong><?php echo $row['address'];?><br>
                            <strong>Phone Number:  </strong><?php echo $row['phone'];?><br>
                            <strong>Email: </strong><?php echo $row['email'];?><br>
                            <strong>Lat: </strong><?php echo $row['lat'];?><br>
                            <strong>Lon: </strong><?php echo $row['lon'];?><br>
                        </div>
                        <div class="col-lg-2"><button type="button" class="btn btn-primary">See More</button></div>
                    </div>
                </div>
                </div>
                </div>
                <?php $i++; ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<script>
    // Function to initialize the map
    function initMap() {
        // Original code for creating a Leaflet map
        var map = L.map('map').setView([0, 0], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Get the user's current location using Geolocation API
        navigator.geolocation.getCurrentPosition(function (position) {
            var userLat = position.coords.latitude;
            var userLon = position.coords.longitude;

            // Set the map center to the user's location
            map.setView([userLat, userLon], 13);

            // Add a marker at the user's location
            L.marker([userLat, userLon]).addTo(map)
                .bindPopup('Your current location').openPopup();

            // Add a marker for the University of Michigan (replace with actual coordinates)
            var umichLat = 42.2780; // Replace with actual latitude of University of Michigan
            var umichLon = -83.7382; // Replace with actual longitude of University of Michigan
            //Add marker from database
            
            <?php
                    $query = "Select * FROM caregiver";
                    $result = mysqli_query($mysqli, $query);
                    $i = 0;
                
                    while($row = mysqli_fetch_array($result)) { ?>
            
            var dbMarker = L.marker([<?php echo $row['lat'];?>, <?php echo $row['lon'];?>]).addTo(map)
            
            <?php } ?>
            

            L.marker([umichLat, umichLon]).addTo(map)
                .bindPopup('University of Michigan').openPopup();

            // New code: Add markers for nearby addresses (Replace with actual data from your database)
            var nearbyAddresses = [
                { lat: userLat + 6.77, lon: userLon + 10.50, title: 'Nearby Location 1' },
                { lat: userLat - 11.0, lon: userLon - 10.50, title: 'Nearby Location 2' },
                // Add more addresses as needed
            ];

            nearbyAddresses.forEach(function (address) {
                L.marker([address.lat, address.lon]).addTo(map)
                    .bindPopup(address.title);
            });
        }, function (error) {
            console.error('Error getting user location:', error.message);
        });
    }

    // Call the initMap function when the page is loaded
    document.addEventListener('DOMContentLoaded', initMap);
</script>
<script>
        // Function to fetch coordinates based on address input
        function getCoordinates() {
            // Retrieve the address input
            var address = document.getElementById("address").value;
            // Construct URL for API request
            var url = "https://nominatim.openstreetmap.org/search?format=json&q=" + encodeURIComponent(address);

            // Fetch coordinates from the API
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    // Check if coordinates are available
                    if (data.length > 0) {
                        // Extract latitude and longitude
                        var latitude = data[0].lat;
                        var longitude = data[0].lon;
                        // Display coordinates on the page
                        document.getElementById("coordinates").innerHTML = "<p>Latitude: " + latitude + "</p><p>Longitude: " + longitude + "</p>";
                    } else {
                        // Inform user if coordinates are not found
                        document.getElementById("coordinates").innerHTML = "<p>Coordinates for the given address could not be found.</p>";
                    }
                })
                .catch(error => {
                    // Log and inform user about errors during API request
                    console.error('Error:', error);
                    document.getElementById("coordinates").innerHTML = "<p>There was an error processing your request. Please try again later.</p>";
                });
        }
    </script>
</body>
</html>
