<?php
    session_start();
    require_once '../lib/bootstrap.php';
    require_once '../controller/UserController.php';
    UserController::login();
?>
