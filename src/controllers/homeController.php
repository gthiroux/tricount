<?php


$error = [];
$event = new Models\Event();
$events = $event->getAllEvent();


/** formulaire de création d'un user */
if (isset($_POST["addEvent"])) {

    $event = new Models\Event();

    try {
        $event->setNameEvent($_POST['nameEvent']);
    } catch (\Exception $e) {
        $error['nameEvent'] = $e->getMessage();
    }
    try {
        $idUser = $event->getId($_POST['emailUser']);
    } catch (\Exception $e) {
        $error['emailUser'] = $e->getMessage();
    }


    if (empty($error)) {
        if ($event->createEvent($idUser)) {
            redirectTo('/home');
            exit;
        } else {
            $error['global'] = 'Echec de l\'enregistrement';
        }
    }
}

render('home', false, [
    'error' => $error,
    'events' => $events,
]);
