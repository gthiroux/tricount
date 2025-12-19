<?php
session_start();

// Vérifier si l'utilisateur a déjà créé son compte
if (isset($_SESSION['user_registered']) && $_SESSION['user_registered'] === true) {
    // Rediriger vers la page d'accueil si le compte existe déjà
    redirectTo('/');
    exit;
}
$error = [];

$admin = new Models\User();
/** formulaire de création d'un user */
if (isset($_POST["register"])) {


    try {
        $admin->setUsername($_POST['name']);
    } catch (\Exception $e) {
        $error['name'] = $e->getMessage();
    }
    try {
        $admin->setEmail($_POST['email']);
    } catch (\Exception $e) {
        $error['emailUser'] = $e->getMessage();
    }


    if (empty($error)) {
        if ($admin->register()) {
            redirectTo('/home');
            exit;
        } else {
            $error['global'] = 'Echec de l\'enregistrement';
        }
    }
}

render('index', false, [
    'error' => $error,
    'admin' => $admin,
]);
