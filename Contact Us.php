<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Contact Us</title>
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
        <div class="row pb-5">
            <h1>Reach out to us!</h1>
            <form id="contact_form" name="contact_form" method="post">
                <div class="mb-5 row">
                    <div class="col">
                        <label>First Name</label>
                        <input type="text" required maxlength="50" class="form-control" id="first_name" name="first_name">
                    </div>
                    <div class="col">
                        <label>Last Name</label>
                        <input type="text" required maxlength="50" class="form-control" id="last_name" name="last_name">
                    </div>
                </div>
                <div class="mb-5 row">
                    <div class="col">
                        <label for="email_addr">Email address</label>
                        <input type="email" required maxlength="50" class="form-control" id="email_addr" name="email"
                placeholder="name@example.com">
                    </div>
                    <div class="col">
                        <label for="phone_input">Phone</label>
                        <input type="tel" required maxlength="50" class="form-control" id="phone_input" name="Phone"
                placeholder="Phone">
                    </div>
                </div>
                <div class="mb-5">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-primary px-4 btn-lg">Send</button>
            </form>
        </div>

    <div class="row">
        <h1>Frequently Asked Questions</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
</div>
</body>
</html>
