<div class="accounts">
    <?php

    $file = __DIR__ . '/accounts.json';

    if (file_exists($file)) {
        $accounts = json_decode(file_get_contents(__DIR__ . '/accounts.json'), 1);
    } else {
        $accounts = [];
    }

    ?>
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
                        <form action="<?= URL ?>destroy.php?id=<?= $account['id'] ?>" method="post">
                            <button type="submit" class="menu-btn">Delete</button>
                        </form>
                        <form action="<?= URL ?>edit.php?id=<?= $account['id'] ?>" method="post">
                            <button type="submit" class="menu-btn">Edit money</button>
                        </form>
                        <!-- <form action="<?= URL ?>subtract.php?id=<?= $account['id'] ?>" method="post">
                            <button type="submit">Subtract money</button>
                        </form> -->
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>