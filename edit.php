<?php
require './isLogged.php';
if (!$_GET['id']) {
    header("Location: index.php");
} else {
    require './connection.php';
    $query_string = "SELECT tasks.description,
                            tasks.status
                       FROM tasks
                      WHERE tasks.id = {$_GET['id']};";
    $query = $conn->query($query_string);
    $result = $query->fetch();
}
$description = $_POST['description'] ?? NULL;
$status = $_POST['status'] ?? NULL;
if (isset($description) and isset($status)) {
    $query_string = "UPDATE tasks SET `description` = '{$description}', `status` = '{$status}' WHERE `tasks`.`id` = {$_GET['id']};";
    $query = $conn->query($query_string);
    header("Location: index.php");
}
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
    <form method="POST">
        <input type="text" name="description" id="description" placeholder="opis" value="<?= $result[0] ?>" required>
        <?php if ($result[1] == 0): ?>
        <span>Nie zrobione: </span>
        <input type="radio" name="status" id="status" value="0" checked>
        <span>Zrobione: </span>
        <input type="radio" name="status" id="status" value="1">
        <?php else: ?>
        <span>Nie zrobione: </span>
        <input type="radio" name="status" id="status" value="0">
        <span>Zrobione: </span>
        <input type="radio" name="status" id="status" value="1" checked>
        <?php endif; ?>
        <input type="submit" value="Dodaj">
    </form>
</body>

</html>