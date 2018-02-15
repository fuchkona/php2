<?php
use engine\classes\App;
use engine\classes\Auth;
use engine\classes\User;

if (isset($_POST['authorisation'])) {
    $guest = new User();
    $guest->load($_POST['login']);
    if ($guest->getId() && $guest->verifyPass($_POST['pass'])) {
        $auth = new Auth();
        $auth->setUId($guest->getId());
        $auth->setAgent($_SERVER['HTTP_USER_AGENT']);
        $auth->setSecret(time() . $guest->getId() . $guest->getRole());
        $auth->apply();
    }
}

if (isset($_POST['logout'])) {
    $auth = new Auth();
    $auth->load_by_secret($_SESSION['auth_secret']);
    $auth->delete();
}
