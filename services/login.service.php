<?php
require('../database/connection/connect.php');

if (isset($_POST['email']) and $_POST['email'] !== '') {
    $email = $_POST['email'];
    $pass = md5($_POST['password']);

    try {
        $smtm = $conn->prepare('SELECT * FROM `user` WHERE `email` = :email AND `password` = :pass');
        $smtm->bindParam('email', $email);
        $smtm->bindParam('pass', $pass);
        $smtm->execute();
        $res = $smtm->fetchAll();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    if (count($res) > 0) {
        foreach ($res as $row) {
            $id = $row['id'];
            $username = $row['username'];
        }

        if (isset($_SESSION)) {
            session_start();
            $_SESSION['userId'] = $id;
            $_SESSION['username'] = $username;
            header('Location:../index.php');
        }
    } else {
        header('Location:../login.php?login=false');
    }
}
