<?php
    require_once __DIR__ . '/vendor/autoload.php';
    session_start();
?>

<html>
    <body>
        <?php if(! isset($_SESSION['payload'])): ?>
            <span id="idme-wallet-button" data-scope="verify" data-hlp="http://localhost:3000/callback.php"></span>
            <script src="https://s3.amazonaws.com/idme/developer/idme-buttons/assets/js/idme-wallet-button.js"></script>
        <?php else: echo $_SESSION['payload'] ?>
        <?php endif ?>
    </body>
</html>
