<!-- <link rel="stylesheet" href="./css/menu.css" type="text/css"> -->

<div class="menu">
    <div class="menu-btn">
        <a href="<?= URL ?>main.php">Sarašas</a>
    </div>
    <div class="menu-btn">
        <a href="<?= URL ?>create.php">Naujas klientas</a>
    </div>
    <div class="menu-btn">
        <a href="<?= URL ?>edit.php">Prideti $</a>
    </div>
    <div class="menu-btn">
        <a href="<?= URL ?>edit2.php">Nuimti $</a>
    </div>
    <?php if (isset($_SESSION['login']) && $_SESSION['login'] == 1) : ?>
        <form action="<?= URL ?>logout.php" method="post">
            <div class="menu-btn">
                <button type="submit">Labas, <?= $_SESSION['name'] ?></button>
            </div>
        </form>
    <?php else : ?>
        <a href="<?= URL ?>login.php">Login</a>
    <?php endif ?>
</div>