<?php
include "config.php";
$db = new Database();

$username = $_POST['username'];
$password = $_POST['password'];

foreach ($db->login($username, $password) as $x) {
    session_start();
    $_SESSION["username"] = $username;
    $_SESSION["password"] = $password;
    $akses_id = $x['akses_id'];
    $pass = $x['password'];

    // Memeriksa user login sebagai admin atau peminjam
    if (($akses_id == '1') AND ($password == $pass)) {
        header('Location: menu_kader.php');
    } elseif (($akses_id == '2') AND ($password == $pass)) {
        header('Location: menu_user.php');
    } else {
        header('Location: login.php');
    }
}
?>
