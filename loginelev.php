<?php
require 'includes/dbh.inc.php';
$sql = "SELECT * FROM materii where users_id=?;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../index.php?error=loginsqlerror");
    exit();
} else {
    mysqli_stmt_bind_param($stmt, "s", $_SESSION['id']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['programare'] = $row['programare'];
        $_SESSION['analiza'] = $row['analiza'];
        $_SESSION['fizica'] = $row['fizica'];
        $_SESSION['informatica_aplicata'] = $row['informatica_aplicata'];
    }
}
?>
<div style="overflow-x:auto;">
    <table id="tabnot-c">
        <th>Disciplina</th>
        <th>Nume Prof.</th>
        <th>Semestru</th>
        <th> Nota Finala</th>
        <th>Numar Credite</th>
        <tr>
            <td>Analiza </td>
            <td>Ioan Tincu</td>
            <td>Sem I</td>
            <td><?php echo $_SESSION['analiza']; ?></td>
            <td>5</td>
        </tr>
        <tr>
            <td>Programare</td>
            <td>Antoniu Pitic</td>
            <td>Sem I</td>
            <td><?php echo $_SESSION['programare'] ?></td>
            <td>5</td>
        </tr>
        <tr>
            <td>Fizica</td>
            <td>Aurel Pasca</td>
            <td>Sem I</td>
            <td><?php echo $_SESSION['fizica'] ?></td>
            <td>4</td>
        </tr>
        <tr>
            <td>Informatica Aplicata</td>
            <td>Remus Brad</td>
            <td>Sem I</td>
            <td><?php echo $_SESSION['informatica_aplicata']; ?></td>
            <td>5</td>
        </tr>
    </table>
</div>