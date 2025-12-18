<?php
$eventId = isset($_GET['id']) ? (int)$_GET['id'] : null;

if (!$eventId) {
    redirectTo('/');
    exit;
}

$error = [];

$spent = new Models\Spent();
$spents = $spent->getByEventId($eventId);
$nameAutor = $spent->getById(1);


if (isset($_POST["addSpent"])) {

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
        if ($spent->createSpent($eventId)) {
            redirectTo('/event');
            exit;
        } else {
            $error['global'] = 'Echec de l\'enregistrement';
        }
    }
}
render('event', false, [
    'error' => $error,
    'spents' => $spents,
    'nameAutor' => $nameAutor,
]);
