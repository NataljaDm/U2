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
               
                <th scope="col">Saskaitos numeris</th>
                <th scope="col">Vardas</th>
                <th scope="col">Pavarde</th>
                <th scope="col">Asmens kodas</th>
                <th scope="col">Pinigai</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($accounts as $account) : ?>
                <tr>
                    <th scope="row"><?= $account['accNumber'] ?></th>
                    <td><?= $account['name'] ?></td>
                    <td><?= $account['lastName'] ?></td>
                    <td><?= $account['personalCode'] ?></td>
                    <td><?= $account['money'] ?></td>
                    <td>
                        <form action="<?= URL ?>destroy.php?id=<?= $account['id'] ?>" method="post">
                            <button type="submit" class="menu-btn">Istrinti klienta</button>
                        </form>
                        <!--form action="<?= URL ?>edit.php?id=<?= $account['id'] ?>" method="post">
                            <button type="submit" class="menu-btn">Pinigu operacijos</button>
                        </form>-->
                        <!-- <form action="<?= URL ?>subtract.php?id=<?= $account['id'] ?>" method="post">
                            <button type="submit">Subtract money</button>
                        </form> -->
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>