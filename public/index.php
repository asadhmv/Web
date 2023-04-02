<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./CSS/style.css">
</head>
<body>
    <div class="barre_navigation">
        <nav>
            <ul>Home</ul>
            <ul>News</ul>
            <ul>Contact</ul>
        </nav>
        <a href="../app/controllers/doctors.php"><button>Sign In</button></a>
        <a href="../app/controllers/doctors.php"><button>Register</button></a>
    </div>
    <h1>Bienvenu à l'Hôpital</h1>
    <h3><?php echo($_COOKIE['LOGGED_USER']);?></h3>
</body>
</html>