<?php
require './isLogged.php';
require './connection.php';
if ($_GET['id']) {
    $query_string = "DELETE FROM tasks
    WHERE tasks.id = {$_GET['id']}";
    $query = $conn->query($query_string);
}
$conn = NULL;
header('Location: index.php');
?>