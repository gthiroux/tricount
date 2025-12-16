<?php

$error = [];
$spent = new Models\Spent();
$spents = $spent->getAllSpent();
var_dump($spents);

if (!empty($_POST["addSpent"])) {
    $spent = new Models\Spent();

    try {
        $spent->setSpentName($_POST['nameSpent']);
    } catch (\Exception $e) {
        $error['nameSpent'] = $e->getMessage();
    }
    try {
        $spent->setTotalSpent($_POST['totalSpent']);
    } catch (\Exception $e) {
        $error['totalSpent'] = $e->getMessage();
    }


    if (empty($error)) {
        if ($spent->createSpent()) {
            redirectTo('/event');
        } else {
            $error['global'] = 'Echec de l\'enregistrement';
        }
    }
}
render('event', false, [
    'error' => $error,
]);
