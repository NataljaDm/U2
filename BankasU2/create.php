<?php

require __DIR__ . '/bootstrap.php';


if (!isset($_SESSION['login']) || $_SESSION['login'] != 1) {

    header('Location: ' . URL . 'index.php');
    die;
}

$title = 'Add customer';
require __DIR__ . '/top.php';

$old = $_SESSION['old_values'] ?? [];
unset($_SESSION['old_values']);

?>

<?php require __DIR__ . '/menu.php' ?>
<?php require __DIR__ . '/msg.php' ?>

<link rel="stylesheet" href="./css/create.css" type="text/css">

<div class="add">
    <form action="<?= URL ?>store.php" method="post">
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="User name" value="<?= $old['name'] ?? '' ?>">
        </div>
        <div>
            <label for="lastName">Last name</label>
            <input type="text" name="lastName" placeholder="User last name" value="<?= $old['lastName'] ?? '' ?>">
        </div>
        <div>
            <!-- <div>
                <label for="personalCode">Personal code</label>
                <input type="number" name="personalCode" placeholder="Personal code" value="<?= $old['personalCode'] ?? '' ?>">
            </div> -->
            <!-- <div>
                <label for="accNumber">Account number</label>
                <input type="number" name="accNumber" placeholder="Account number" value="<?= $old['accNumber'] ?? '' ?>">
            </div> -->
            <button type="submit" class="menu-btn">Add</button>
        </div>
    </form>
</div>

<?php require __DIR__ . '/bottom.php' ?>