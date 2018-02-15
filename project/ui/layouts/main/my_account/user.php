<?php
use engine\classes\App;

$user = App::getUser();
?>
<h3 class="text-title">Welcome <span class="first-letter-up"><?= $user->getName(); ?></span></h3>
<?php
if ($user->isAdmin()) {
    ?>
    <a class="btn btn-white btn-block" href="/admin">Admin Panel</a>
    <?php
}
?>
<a class="btn btn-white btn-block" href="/profile">Go to profile</a>
<form method="post">
    <button class="btn btn-red btn-block" name="logout" type="submit">Logout</button>
</form>
