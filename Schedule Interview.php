<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Appointment Scheduling</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
        <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    </head>
<body>
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
<div class="container pt-5">
    <h1>Appointment Scheduling</h1>
    <form id="appointmentForm">
        <label for="doctor">Select a Doctor:</label>
        <select id="doctor" name="doctor" required>
            <!-- Populate with doctor names from the database -->
            <option value="doc1">Doctor 1</option>
            <option value="doc2">Doctor 2</option>
            <!-- Add more options as needed -->
        </select>
        <label for="appointmentDate">Select a Date:</label>
        <input type="date" id="appointmentDate" name="appointmentDate" required>
        <label for="appointmentTime">Select a Time:</label>
        <select id="appointmentTime" name="appointmentTime" required>
        <!-- Populate with available time slots for the selected doctor from the database -->
        <option value="09:00">09:00 AM</option>
        <option value="10:00">10:00 AM</option>
        <!-- Add more options as needed -->
        </select>
        <button type="button" onclick="submitForm()">Schedule Appointment</button>
    </form>
    <div id="errorMessage" class="error-message"></div>
    <div id="successMessage" class="success-message"></div>
</div>
<script>
    // Simulated available time slots data
    const availableSlots = {
        doc1: {
            '2024-03-05': ['09:00', '10:00', '11:00'],
            '2024-03-06': ['10:00', '11:00', '12:00'],
        },
        doc2: {
            '2024-03-05': ['14:00', '15:00', '16:00'],
            '2024-03-06': ['16:00', '17:00', '18:00'],
        },
    };

    function submitForm() {
        const doctor = document.getElementById('doctor').value;
        const appointmentDate = document.getElementById('appointmentDate').value;
        const appointmentTime = document.getElementById('appointmentTime').value;

        // Check if the selected time slot is available
        if (availableSlots[doctor] && availableSlots[doctor][appointmentDate] && availableSlots[doctor][appointmentDate].includes(appointmentTime)) {
            document.getElementById('successMessage').textContent = 'Appointment scheduled successfully!';
            document.getElementById('errorMessage').textContent = '';
        } else {
            document.getElementById('errorMessage').textContent = 'Selected time slot is not available. Please choose another.';
            document.getElementById('successMessage').textContent = '';
        }
    }
</script>

</body>
</html>
