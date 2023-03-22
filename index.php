<?php
require './isLogged.php';
require './connection.php';
$query_string = "SELECT tasks.id,
                        tasks.description,
                        tasks.status
                   FROM tasks
                  WHERE tasks.user_id = {$_SESSION['userId']};";
$query = $conn->query($query_string);
$result = $query->fetchAll();
$conn = NULL;
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if (isset($result)): ?>
    <table border="1">
        <tr>
            <th>Zadanie</th>
            <th>Status</th>
            <th>Opcje</th>
        </tr>
        <?php foreach ($result as $r): ?>
        <tr>
            <td><?= $r[1] ?></td>
            <td><?= $r[2] ? "zrobione" : "niezrobione" ?></td>
            <td>
                <a href="delete.php?id=<?= $r[0] ?>">usun</a>
                <a href="edit.php?id=<?= $r[0] ?>">edytuj</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php else: ?>
    <h1>Brak zadań!</h1>
    <?php endif; ?>
    <a href="./create.php">Dodaj zadanie!</a>
    <a href="log_out.php">Wyloguj się</a>
</body>

</html>