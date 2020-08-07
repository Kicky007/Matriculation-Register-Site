<?php
require "header.php";
?>

<main>

    <?php
    if (isset($_SESSION['email'])) {
        echo '<p>You are logged as ' . $_SESSION['nume'] . '</p>';
        if ($_SESSION['isProf']) {
            include "loginprof.php";
        } else {
            include "loginelev.php";
        }
    } else {

        echo '
            <div class="logout">
             <p>Registru matricol</p>
             <p>Please Login or Register</p>
            </div>
        ';
        include "signupdemo.php";
    }
    ?>
    <?php
    if (isset($_GET['error'])) {
        $css1 = "signuperror";

        if ($_GET['error'] == "emptyfields") {
            echo '<p class="' . $css1 . '"> Fill in all fields!</p>';
        } elseif ($_GET['error'] == "lipsesteTotul") {
            echo '<p class="' . $css1 . '">Nu ai introdus nimic, poate parola</p>';
        } elseif ($_GET['error'] == "InvalidNume") {
            echo '<p class="' . $css1 . '">Nume Invalid.</p>';
        } elseif ($_GET['error'] == "InvalidPrenume") {
            echo '<p class="' . $css1 . '">Prenume Invalid.</p>';
        } elseif ($_GET['error'] == "Invalidmail") {
            echo '<p class="' . $css1 . '">Email Invalid.</p>';
        } elseif ($_GET['error'] == "nume,prenume") {
            echo '<p class="' . $css1 . '">Lipseste numele si prenumele</p>';
        } elseif ($_GET['error'] == "sqlerror") {
            echo '<p class="' . $css1 . '">Eroare SQL</p>';
        } elseif ($_GET['error'] == "emailtaken") {
            echo '<p class="' . $css1 . '">Email Luat</p>';
        } elseif ($_GET['error'] == "sqlInserterror") {
            echo '<p class="' . $css1 . '">Inserare esuata in baza de date.</p>';
        } elseif ($_GET['error'] == "passwordcheck") {
            echo '<p class="' . $css1 . '">Parolele introduse nu coincid.</p>';
        }
        echo '<br>';
    } elseif (isset($_GET['signup'])) {
        if ($_GET['signup'] == "success") {
            $css2 = "signupsuccess";
            echo '<p class="' . $css2 . '">Signup successful!</p>';
            echo '<br>';
        }
    }
    ?>

</main>


<?php
require "footer.php";
?>