<?php

require __DIR__ . '/bootstrap.php';
require __DIR__ . '/msg.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    http_response_code(405);
    die;
}

$name = $_POST['name'] ?? '';
$lastName = $_POST['lastName'] ?? '';
$personalCode = $_POST['personalCode'] ?? '';

if ($name == '' || $lastName == '') {
    $_SESSION['message'] = [
        'text' => 'Visi laukeliai turi buti uzpildyti',
        'type' => 'red'
    ];
    $_SESSION['old_values'] = $_POST;
    header('Location: ' . URL . 'create.php');
    die;
}

if (strlen($name) < 4) {
    $_SESSION['message'] = [
        'text' => 'Vardas turi buti daugiau nei 4 raides',
        'type' => 'red'
    ];
    $_SESSION['old_values'] = $_POST;
    header('Location: ' . URL . 'create.php');
    die;
}

if (strlen($lastName) < 4) {
    $_SESSION['message'] = [
        'text' => 'Pavarde turi buti daugiau nei 4 raides',
        'type' => 'red'
    ];
    $_SESSION['old_values'] = $_POST;
    header('Location: ' . URL . 'create.php');
    die;
}
if (strlen($personalCode) < 11) {
    $_SESSION['message'] = [
        'text' => 'Kodas turi buti is 11 skaiciu',
        'type' => 'red'
    ];
    $_SESSION['old_values'] = $_POST;
    header('Location: ' . URL . 'create.php');
    die;
}

$accounts = json_decode(file_get_contents(__DIR__ . '/accounts.json'), 1);

$account = [
    'id' => rand(1, 10),
    'personalCode' => $personalCode,
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
    'text' => 'Naujas klientas pridetas',
    'type' => 'green'
];

header('Location: ' . URL . 'main.php');
die;