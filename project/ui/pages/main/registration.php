<?php
use engine\classes\User;

if (isset($_POST['registration'])) {
    $user = new User();
    $user->setName($_POST['name']);
    $user->setLogin($_POST['login']);
    $user->setPass($_POST['pass']);
    if ($user->save()) {
        $alert = "<h2>You are successfully registered!</h2>";
    }
}
?>
<div class="spaced-container">
    <h1>Registration</h1>
    <hr>
    <form method="post">
        <p class="text-title">Enter your name</p>
        <input class="text-input" type="text" maxlength="150" required="required" name="name"/>
        <p class="text-title">Enter your login</p>
        <input class="text-input" type="text" maxlength="150" required="required" name="login"/>
        <p class="text-title">Enter your password</p>
        <input class="text-input" type="text" maxlength="64" required="required" name="pass"/>
        <br>
        <button class="btn btn-red btn-big" name="registration" type="submit">Submit</button>
    </form>
    <?= $alert ?>
</div>