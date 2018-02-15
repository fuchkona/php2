<div id="my-account-panel" class="my-account-panel">
    <?php
    if (!\engine\classes\App::getUser()) {
        require_once __DIR__ . '/my_account/guest.php';
    } else {
        require_once __DIR__ . '/my_account/user.php';
    }
    ?>
</div>