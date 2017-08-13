<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/classes/User.php');
$usr = new User();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $userLog = $usr->userLogin($email, $password);
}
?>