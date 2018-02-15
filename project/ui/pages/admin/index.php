<?php
use engine\classes\App;

$user = App::getUser();
?>
<h1>Welcome to admin panel <?= $user->getName(); ?></h1>
<hr>
