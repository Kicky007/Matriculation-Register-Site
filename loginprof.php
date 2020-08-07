<?php
require 'includes/dbh.inc.php';

$query = "SELECT * FROM `users` WHERE `isProf`=0 ORDER BY idStud";

if ($result = $conn->query($query)) {

    /* fetch associative array */
    $ii = 0;
    while ($row = $result->fetch_assoc()) {
        $id[$ii] = $row['idStud'];
        $nume[$ii] = $row['Nume'];
        $ii++;
    }
    $i = 0;
    if ($_SESSION['id'] == 14) {
        $query = "SELECT analiza FROM `materii` WHERE `users_id`=?";
    } else if ($_SESSION['id'] == 15) {
        $query = "SELECT informatica_aplicata FROM `materii` WHERE `users_id`=?";
    } else if ($_SESSION['id'] == 16) {
        $query = "SELECT fizica FROM `materii` WHERE `users_id`=?";
    } else if ($_SESSION['id'] == 17) {
        $query = "SELECT programare FROM `materii` WHERE `users_id`=?";
    }
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("Location: ../index.php?error=sqlerror");
        exit();
    } else {
        while ($i <= $ii) {
            mysqli_stmt_bind_param($stmt, "s", $id[$i]);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            while ($row1 = $result->fetch_assoc()) {
                if ($_SESSION['id'] == 14) {
                    echo $nume[$i] . ". " . $row1['analiza'] . "<br> ";
                } else if ($_SESSION['id'] == 15) {
                    echo $nume[$i] . ". " . $row1['informatica_aplicata'] . "<br> ";
                } else if ($_SESSION['id'] == 16) {
                    echo $nume[$i]  . ". " . $row1['fizica'] . "<br> ";
                } else if ($_SESSION['id'] == 17) {
                    echo $nume[$i]  . ". " . $row1['programare'] . "<br> ";
                }
            }
            $i++;
        }
    }


    /* free result set */
    $result->free();
}

/* close connection */
$conn->close();
