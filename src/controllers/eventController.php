<?php
$eventId = isset($_GET['id']) ? (int)$_GET['id'] : null;

if (!$eventId) {
    redirectTo('/');
    exit;
}

$error = [];
$showPopup = false;
$success = false;

$spent = new Models\Spent();
$spents = $spent->getByEventId($eventId);
$nameAutor = $spent->getById(1);


// var_dump($nameAutor['name']);
// var_dump($spent);


if (isset($_POST["addSpent"])) {

    $spent = new Models\Spent();

    try {
        $spent->setSpentName($_POST['nameSpent']);
    } catch (\Exception $e) {
        $error['nameSpent'] = $e->getMessage();
        $showPopup = true;
    }
    try {
        $spent->setTotalSpent($_POST['totalSpent']);
    } catch (\Exception $e) {
        $error['totalSpent'] = $e->getMessage();
        $showPopup = true;
    }


    if (empty($error)) {
        if ($spent->createSpent($eventId)) {
            $success = true;
            redirectTo('/event');
            exit;
        } else {
            $error['global'] = 'Echec de l\'enregistrement';
            $showPopup = true;
        }
    }
}
render('event', false, [
    'error' => $error,
    'spents' => $spents,
    'nameAutor' => $nameAutor,
    'success' => $success,
]);
