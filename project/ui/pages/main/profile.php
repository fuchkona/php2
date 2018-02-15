<div class="spaced-container">
    <?php if ($user = \engine\classes\App::getUser()) {
        ?>
        <h1><span class="fa fa-user"></span> Welcome <?= $user->getName() ?></h1>
        <hr>
        <p class="text-title">Your login is <span class="first-letter-up"><?= $user->getLogin() ?></span></p>
        <?php
    } else {
        ?>
        <h2>You need to login</h2>
        <?php
    }
    ?>
</div>
