<?php
require './isLogged.php';
$description = $_POST['description'] ?? NULL;
$status = $_POST['status'] ?? NULL;
if (isset($description) and isset($status)) {
    require './connection.php';
    $query_string = "INSERT INTO tasks (id, description, status, user_id) VALUES (NULL, '{$description}', '{$status}', '{$_SESSION['userId']}')";
    $query = $conn->query($query_string);
    $conn = NULL;
    header('Location:index.php');
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
        <input type="text" name="description" id="description" placeholder="opis" required>
        <span>Nie zrobione: </span>
        <input type="radio" name="status" id="status" value="0">
        <span>Zrobione: </span>
        <input type="radio" name="status" id="status" value="1">
        <input type="submit" value="Dodaj">
    </form>
</body>

</html>