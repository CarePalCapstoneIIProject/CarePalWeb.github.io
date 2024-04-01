<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags for character set and viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address to Coordinates</title>
</head>
<body>
    <!-- Page title -->
    <h1>Address to Coordinates Converter</h1>
    <!-- Input field for entering address -->
    <label for="address">Enter Address:</label>
    <input type="text" id="address" placeholder="Enter an address">
    <!-- Button to trigger conversion -->
    <button onclick="getCoordinates()">Get Coordinates</button>
    <!-- Container for displaying coordinates -->
    <div id="coordinates"></div>

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
