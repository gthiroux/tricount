<?php
session_start();
$eventId = isset($_GET['id']) ? (int)$_GET['id'] : null;

if (!$eventId) {
    redirectTo('/');
    exit;
}

$error = [];

$spent = new Models\Spent();
$event = new Models\Event();

$spents = $spent->getByEventId($eventId);
$admin = $spent->getAdmin(1);
// var_dump($admin);

// Initialiser la liste des users depuis la session
if (!isset($_SESSION['usersList_' . $eventId])) {
    $_SESSION['usersList_' . $eventId] = [$admin];
}
$usersList = $_SESSION['usersList_' . $eventId];


/** formulaire pour ajouter une dépense */
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
            redirectTo('/event?id=' . $eventId);
            exit;
        } else {
            $error['global'] = 'Echec de l\'enregistrement';
        }
    }
}
// modifier et supprimer un event
if (isset($_POST["modifEvent"])) {

    if (empty($error)) {
        if ($event->update($eventId )) {
            redirectTo('/home');
            exit;
        } else {
            $error['global'] = 'Echec de l\'enregistrement';
        }
    }
}
if (isset($_POST["deleteEvent"])) {
    if (empty($error)) {
        if ($event->delete($eventId )) {
            redirectTo('/home');
            exit;
        } else {
            $error['global'] = 'Echec de l\'enregistrement';
        }
    }
}
/** formulaire de création d'un user */
if (isset($_POST["addUser"])) {

    $user = new Models\User();

    try {
        $user->setUsername($_POST['nameUser']);
    } catch (\Exception $e) {
        $error['nameUser'] = $e->getMessage();
    }
    try {
        $user->setEmail($_POST['email']);
    } catch (\Exception $e) {
        $error['email'] = $e->getMessage();
    }


    if (empty($error)) {
        if ($user->register()) {
            $_SESSION['usersList_' . $eventId][] = $user;
            $usersList = $_SESSION['usersList_' . $eventId];

            redirectTo('/event?id=' . $eventId);
            exit;
        } else {
            $error['global'] = 'Echec de l\'enregistrement';
        }
    }
}


render('event', false, [
    'error' => $error,
    'spents' => $spents,
    'admin' => $admin,
    'usersList' => $usersList,
]);
