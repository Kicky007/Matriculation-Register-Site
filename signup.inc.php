<?php
if (isset($_POST['signup-submit'])) {

    require 'dbh.inc.php';

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['mail'];
    $password = $_POST['password'];
    $rPassword = $_POST['rPassword'];

    if (empty($fname) || empty($lname) || empty($email) || empty($password) || empty($rPassword)) {

        header("Location: ../index.php?error=emptyfields&Prenumele=" . $fname . "&Numele=" . $lname . "&mail=" . $email);
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $fname) && !preg_match("/^[a-zA-Z0-9]*$/", $lname)) {
        header("Location: ../index.php?error=lipsesteTotul");
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $fname)) {
        header("Location: ../index.php?error=InvalidNume&Prenumele=" . $fname . "&mail=" . $email);
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $lname)) {
        header("Location: ../index.php?error=Invalidmail&Prenumele=" . $fname . "&Numele=" . $lname);
        exit();
    } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $lname) && !preg_match("/^[a-zA-Z0-9]*$/", $fname)) {
        header("Location: ../index.php?error=nume,prenume&mail=" . $email);
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../index.php?error=Invalidmail&Prenumele=" . $fname . "&Numele=" . $lname);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $fname)) {
        header("Location: ../index.php?error=InvalidPrenume&Numele=" . $lname . "&mail=" . $email);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $lname)) {
        header("Location: ../index.php?error=InvalidNume&Numele=" . $lname . "&mail=" . $email);
        exit();
    } elseif ($password !== $rPassword) {
        header("Location: ../index.php?error=passwordcheck&Prenumele=" . $fname . "&Numele=" . $lname . "&mail=" . $email);
    } else {

        $sql = "SELECT adresaEmail FROM users WHERE adresaEmail=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../index.php?error=emailtaken&Prenumele=" . $fname . "&Numele=" . $lname);
                exit();
            } else {
                $sql = "INSERT INTO users (Prenume, Nume, Parola, adresaEmail) VALUES (?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../index.php?error=sqlInserterror");
                    exit();
                } else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "ssss", $fname, $lname, $hashedPwd, $email);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../index.php?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../index.php");
    exit();
}
