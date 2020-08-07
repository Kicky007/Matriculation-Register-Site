<?php
if (isset($_POST['login-submit'])) {

    require 'dbh.inc.php';

    $mail = $_POST['mail'];
    $password = $_POST['pass'];

    if (empty($mail) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    } else {

        $sql = "SELECT * FROM users where adresaEmail=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        } else {

            mysqli_stmt_bind_param($stmt, "s", $mail);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['Parola']);
                if ($pwdCheck == false) {
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                } else if ($pwdCheck == true) {
                    //Aici e login succesfull
                    session_start();
                    $_SESSION['id']       =     $row['idStud'];
                    $_SESSION['email']    =     $row['adresaEmail'];
                    $_SESSION['nume']     =     $row['Nume'];
                    $_SESSION['prenume']  =     $row['Prenume'];
                    $_SESSION['isProf']   =     $row['isProf'];

                    header("Location: ../index.php?login=success");
                    exit();
                } else {
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                }
            } else {
                header("Location: ../index.php?error=nouser");
                exit();
            }
        }
    }
} else {
    //Schimba locatia acestui header deoarece index.php este deja luat.
    //Schimba-l cu note.php sau ceva de genul.
    header("Location: ../index.php");
    exit();
}
