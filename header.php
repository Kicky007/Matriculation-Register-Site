<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <style>

    </style>
</head>

<body>
    <div id="container">
        <header>
            <button type="submit" class="btn btn-default btn-lg"><a href="index.php">HOME</a></button>

            <?php
            if (isset($_SESSION['email'])) {
                echo '<div class="login-form">
                     <form action="includes/logout.inc.php" method="post">
                     <button type="submit" class="btn btn-default btn-lg" name="logout-submit" id="logoutBtn">Logout</button>
                     </form>
                  </div>';
            } else {
                include 'indexbutton.php';
            }
            ?>





        </header>