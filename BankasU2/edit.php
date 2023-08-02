<?php

require __DIR__ . '/bootstrap.php';

if (!isset($_SESSION['login']) || $_SESSION['login'] != 1) {

    header('Location: ' . URL . 'index.php');
    die;
}

$title = 'Add money to customer';
require __DIR__ . '/top.php';

$old = $_SESSION['old_values'] ?? [];
unset($_SESSION['old_values']);

$accounts = json_decode(file_get_contents(__DIR__ . '/accounts.json'), 1);

?>

<?php require __DIR__ . '/menu.php' ?>
<?php require __DIR__ . '/msg.php' ?>

<div class="add">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Account id</th>
                <th scope="col">Account Number</th>
                <th scope="col">User Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Personal Code</th>
                <th scope="col">Money</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($accounts as $account) : ?>
                <tr>
                    <th scope="row"><?= $account['id'] ?></th>
                    <td><?= $account['accNumber'] ?></td>
                    <td><?= $account['name'] ?></td>
                    <td><?= $account['lastName'] ?></td>
                    <td><?= $account['personalCode'] ?></td>
                    <td><?= $account['money'] ?></td>
                    <td>
                        <form action="<?= URL ?>update.php?id=<?= $account['id'] ?>" method="post">
                            <input type="number" name="money" placeholder="Add money to account" value="money">
                            <button type="submit">Add</button>
                            <a href="<?= URL ?>main.php">Cancel</a>
                        </form>
                        <form action="<?= URL ?>minus.php?id=<?= $account['id'] ?>" method="post">
                            <input type="number" name="money" placeholder="Subtract money from account" value="money">
                            <button type="submit">Minus</button>
                            <a href="<?= URL ?>main.php">Cancel</a>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php require __DIR__ . '/bottom.php' ?>

<!-- ?id=<?= $account['id'] ?> -->