<?php

require __DIR__ . '/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    http_response_code(405);
    die;
}

if (!isset($_SESSION['id'])) {
    header('Location: ' . URL . 'index.php');
}

unset($_SESSION['login']);
unset($_SESSION['name']);
unset($_SESSION['id']);
unset($_SESSION['email']);

header('Location: ' . URL . 'index.php');