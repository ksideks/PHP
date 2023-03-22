<?php
session_start();
if (!isset($_SESSION['isLogged'])) {
    $_SESSION['isLogged'] = False;
}
if ($_SESSION['isLogged']) {
    header('location:index.php');
}

$login = $_POST['login'] ?? NULL;
$password = $_POST['password'] ?? NULL;
if (isset($login) and isset($password)) {
    require './connection.php';
    $query_string = "SELECT users.id,
                            users.login,
                            users.password
                       FROM users
                      WHERE users.login = '$login' 
                        AND users.password = '$password'";
    $query = $conn->query($query_string);
    $result = $query->fetch();
    if ($result) {
        $_SESSION['userId'] = $result[0];
        $_SESSION['isLogged'] = True;
        $conn = NULL;
        header('location: index.php');
    }
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
        <input type="text" name="login" id="login" placeholder="login" required>
        <input type="password" name="password" id="password" placeholder="password" required>
        <input type="submit" value="Log in">
    </form>
</body>

</html>