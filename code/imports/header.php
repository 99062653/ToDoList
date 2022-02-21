<header>
    <?php if (!isset($user)) { ?>
        <p><a class="urls" href="code/pages/login.php">Login</a></p>
    <?php } else { ?>
        <p><?php $user['name'] ?></p>
    <?php } ?>
</header>