<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body style="height:100%;background-color: rgb(150, 13, 181);">
    <h1>Sign In</h1>
    <form method="POST">
        <input name="email" placeholder="Email" required><br>
        <input name="password" placeholder="Password" type="password" required>
        <input type="submit" value="Sign In">
    </form>
</body>