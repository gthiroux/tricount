<?php
session_start();
$spentId = isset($_GET['id']) ? (int)$_GET['id'] : null;

$error = [];
$spent = new Models\Spent();
$spents = $spent->getBySpentId($spentId);
$spentData = $spents[0];

if (!$spentData) {
    redirectTo('/');
    exit;
}
// Récupérer l'eventId depuis la dépense
$eventId = $spentData['id_event'];

// Récupérer la liste des users depuis la session
$usersList = isset($_SESSION['usersList_' . $eventId]) ? $_SESSION['usersList_' . $eventId] : [];


$totalSpent = $spentData['spent'];
$montantParPersonne = count($usersList) > 0 ? $totalSpent / count($usersList) : $totalSpent;
if (isset($_POST["modifSpent"])) {

    if (empty($error)) {
        if ($spent->update($spentId)) {
            redirectTo('/event?id=' . $eventId);
            exit;
        } else {
            $error['global'] = 'Echec de l\'enregistrement';
        }
    }
}
if (isset($_POST["deleteSpent"])) {

    if (empty($error)) {
        if ($spent->delete($spentId)) {
            redirectTo('/event?id=' . $eventId);
            exit;
        } else {
            $error['global'] = 'Echec de l\'enregistrement';
        }
    }
}

render('spent', false, [
    'spents' => $spents,
    'admin' => $spent->getAdmin(1),
    'usersList' => $usersList,
    'montantParPersonne' => round($montantParPersonne, 2),
    'spentData' => $spentData,
]);
