<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login-user.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome bij je dashboard</h1>
    <p>Je bent ingelogd!</p>
    <button><a href="logout.php">Loguit</a></button>

    <h2>Productbeheer</h2>
    <button><a href="../product/product-view.php">Bekijk producten</a></button> <br>
    <button><a href="../product/product-insert.php">Voeg product toe</a></button>
</body>
</html>
