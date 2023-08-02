<?php
require __DIR__ . '/bootstrap.php';
$title = 'Naujas klientas';
require __DIR__ . '/top.php';
?>

<?php require __DIR__ . '/menu.php' ?>
<?php require __DIR__ . '/msg.php' ?>

<link rel="stylesheet" href="./css/create.css" type="text/css">

<div class="add">
    <form action="<?= URL ?>store.php" method="post">
    <h1>Naujas klientas</h1>
        <div>
            <label for="name">Vardas</label>
            <input type="text" name="name" placeholder="" value="<?= $old['name'] ?? '' ?>">
        </div>
        <div>
            <label for="lastName">Pavardė</label>
            <input type="text" name="lastName" placeholder="" value="<?= $old['lastName'] ?? '' ?>">
        </div>
        <div>
            <div>
                <label for="personalCode">Asmens kodas</label>
                <input type="number" name="personalCode" placeholder="" value="<?= $old['personalCode'] ?? '' ?>">
            </div>
            <!-- <div>
                <label for="accNumber">Account number</label>
                <input type="number" name="accNumber" placeholder="Account number" value="<?= $old['accNumber'] ?? '' ?>">
            </div> -->
            <button type="submit" class="menu-btn">Sukurti</button>
        </div>
    </form>
</div>

<?php require __DIR__ . '/bottom.php' ?>