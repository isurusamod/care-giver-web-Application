<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caregiver Web</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">

    <style>
        @keyframes blink {
            0% { opacity: 1; }
            50% { opacity: 0; }
            100% { opacity: 1; }
        }

        .blink {
            animation: blink 3s infinite;
        }

        .menu ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .menu ul li {
            display: inline;
            margin-right: 20px;
        }

        .menu ul li a {
            text-decoration: none;
            color: #000;
            transition: color 0.3s;
        }

        .menu ul li a:hover {
            color: #007BFF;
        }

        .clearfix {
            clear: both;
        }
    </style>
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo.png" alt="HealthCare Logo" class="blink">
                </a>
            </div>
            <div class="menu text-right">
                <ul>
                    <li><a href="<?php echo SITEURL; ?>">Home</a></li>
                    <li><a href="<?php echo SITEURL; ?>about.php">About Us</a></li>
                    <li><a href="<?php echo SITEURL; ?>categories.php">Caregiver</a></li>
                    <li><a href="https://www.facebook.com/profile.php?id=61558521693187&mibextid=LQQJ4d" target="_blank">Our Page</a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->

</body>
</html>
