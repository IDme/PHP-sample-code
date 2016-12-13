<?php
    session_start();
    require_once 'vendor/autoload.php';
?>

<html>
    <body>
        <?php if(! isset($_SESSION['payload'])): ?>
            <a href="/callback" class="idme-btn">
              <img src="https://s3.amazonaws.com/idme/developer/idme-buttons-2.0.1/assets/img/btn-alt-Troop.png" border="0" alt="Verify with ID.me Troop ID" class="idme-btn-primary-sm-Troop">
            </a>
        <?php else: echo $_SESSION['payload']; ?>
        <?php endif ?>
    </body>
</html>
