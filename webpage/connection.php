<?php

$db = new PDO('mysql:host=localhost;dbname=blog', 'root', 'root');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$add_account_stmt = $db->prepare('INSERT INTO users(username, email, password, fullname, dob) VALUES(?,?,?,?,?)');



$username = '';
$email = '';
$password = '';
$fullname = '';
$dob = '';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_REQUEST['username'];
    $fullname = $_REQUEST['fullname'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['pwd'];
    $dob = date("Y/m/d");

     $add_account_stmt->execute(array($username, $email, $password,$fullname, $dob));
     header('Location: index.php', TRUE, 301);

}

?>