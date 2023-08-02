<?php

require __DIR__ . '/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $users = json_decode(file_get_contents(__DIR__ . '/users.json'), 1);
    foreach ($users as $user) {
        if ($_POST['email'] == $user['email'] && md5($_POST['psw']) == $user['psw']) {
            $_SESSION['login'] = 1;
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['id'] = $user['id'];
            header('Location: ' . URL . 'main.php');
            die;
        }
    }
    header('Location: ' . URL . 'index.php');
    die;
}

if (isset($_SESSION['login']) && $_SESSION['login'] == 1) {
    header('Location: ' . URL . 'main.php');
    die;
}

$title = 'Login';
require __DIR__ . '/top.php';
?>

<?php $title = 'Login'; ?>
<div class="login-container">
    <div class="login" style="width: 500px; height: 300px; border: 1px solid grey;">
        <form method="post" action="<?= URL ?>index.php">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="psw" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?php

require(__DIR__ . '/bottom.php');