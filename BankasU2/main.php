<?php

require __DIR__ . '/bootstrap.php';


if (!isset($_SESSION['login']) || $_SESSION['login'] != 1) {

    header('Location: ' . URL . 'index.php');
    die;
}

$title = 'Bank';
?>
<?php require __DIR__ . '/top.php' ?>
<?php require __DIR__ . '/msg.php' ?>
<?php require __DIR__ . '/menu.php' ?>


<?php require __DIR__ . '/table.php' ?>
<?php

require(__DIR__ . '/bottom.php');