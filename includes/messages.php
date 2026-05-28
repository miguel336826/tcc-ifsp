<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}

if(isset($_SESSION["success"])){?>
    <div class="alert alert-success" role="alert">
        <?php echo $_SESSION["succes"];
        unset($_SESSION["success"]);
        ?>
    </div>
    <?php
}
if(isset($_SESSION["error"])){?>
    <div class="alert alert-danger" role="alert">
        <?php echo $_SESSION["error"];
        unset($_SESSION["error"]);
        ?>
    </div>
    <?php
}
?>