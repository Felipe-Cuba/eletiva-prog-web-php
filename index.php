<?php
include_once('./database/connection/connect.php');

if (!isset($_SESSION['userId'])) {
    header('Location:login.php');
} else {
    echo 'Eai';
}
