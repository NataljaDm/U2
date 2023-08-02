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

$name = $_POST['name'] ?? '';
// $accNumber = $_POST['accNumber'] ?? '';
$lastName = $_POST['lastName'] ?? '';
// $personalCode = $_POST['personalCode'] ?? '';
$money = $_POST['money'] ?? '';
$randPersonal = rand(1, 6) . rand(1, 999999) . rand(1, 999) . rand(1, 9);

$accounts = json_decode(file_get_contents(__DIR__ . '/accounts.json'), 1);

$find = false;

foreach ($accounts as $key => $acc) {
    if ($acc['id'] == $_GET['id']) {
        $find = true;
        $currentMoney = $acc['money'];
        $newMoney = $currentMoney - $money;
        if ($newMoney < 0) {
            $newMoney = 0;
        } else {
            $accounts[$key]['money'] = $newMoney;
        }


        $accounts[$key] = [
            'id' => uniqid(),
            'personalCode' => $randPersonal,
            'name' => $acc['name'],
            'lastName' => $acc['lastName'],
            'accNumber' => 'LT' . rand(1, 999999999999999999),
            'money' => $newMoney
        ];
        file_put_contents(__DIR__ . '/accounts.json', json_encode($accounts));
        break;
    }
}

$_SESSION['message'] = [
    'text' => $find ? 'Money subtracted from account' : 'Money not subtracted',
    'type' => $find ? 'green' : 'red'
];

header('Location: ' . URL . 'main.php');
die;