<?php

require __DIR__ . '/bootstrap.php';
require __DIR__ . '/msg.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    http_response_code(405);
    die;
}

$name = $_POST['name'] ?? '';
// $accNumber = $_POST['accNumber'] ?? '';
$lastName = $_POST['lastName'] ?? '';
// $randomCode = rand(999999999999999999, 999999999999999999);
// $personalCode = $_POST['personalCode'] ?? '';
$randPersonal = rand(1, 6) . rand(1, 999999) . rand(1, 999) . rand(1, 9);

if ($name == '' || $lastName == '') {
    $_SESSION['message'] = [
        'text' => 'Laukeliai turi buti uzpildyti',
        'type' => 'red'
    ];
    $_SESSION['old_values'] = $_POST;
    header('Location: ' . URL . 'create.php');
    die;
}

if (strlen($name) < 4) {
    $_SESSION['message'] = [
        'text' => 'Name turi buti daugiau nei 4 raides',
        'type' => 'red'
    ];
    $_SESSION['old_values'] = $_POST;
    header('Location: ' . URL . 'create.php');
    die;
}

$accounts = json_decode(file_get_contents(__DIR__ . '/accounts.json'), 1);

$account = [
    'id' => uniqid(),
    'personalCode' => $randPersonal,
    'name' => $name,
    'lastName' => $lastName,
    'accNumber' => 'LT' . rand(1, 999999999999999999),
    'money' => 0
];

$accounts[] = $account;

usort($accounts, function ($a, $b) {
    return strcmp($a['lastName'], $b['lastName']);
});

file_put_contents(__DIR__ . '/accounts.json', json_encode($accounts));

$_SESSION['message'] = [
    'text' => 'Person account created',
    'type' => 'green'
];

header('Location: ' . URL . 'main.php');
die;