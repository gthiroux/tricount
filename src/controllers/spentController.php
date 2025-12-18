<?php
$spentId = isset($_GET['id']) ? (int)$_GET['id'] : null;

$spent = new Models\Spent();
$spents = $spent->getBySpentId($spentId);
$nameAutor = $spent->getById(1);
var_dump($spents);
if (!$spentId) {
    redirectTo('/');
    exit;
}

$error = [];

render('spent', false,[
    'spents' => $spents,
    "nameAutor" => $nameAutor,]);
