<?php

require __DIR__ . '/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    http_response_code(405);
    die;
}

if (!isset($_GET['id'])) {
    header('Location:' . URL . 'main.php');
    die;
}

$accounts = json_decode(file_get_contents(__DIR__ . '/accounts.json'), 1);

$find = false;

foreach ($accounts as $key => $acc) {
    if ($acc['id'] == $_GET['id'] && $acc['money'] == 0) {
        $find = true;
        unset($accounts[$key]);
        file_put_contents(__DIR__ . '/accounts.json', json_encode($accounts));
        break;
    }
}

$_SESSION['message'] = [
    'text' => $find ? 'Saskaita istrinta!' : 'Negalima trinti! Saskaitoje yra pinigu',
    'type' => $find ? 'green' : 'red'
];

header('Location: ' . URL . 'main.php');
die;