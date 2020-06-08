<?php
    unset($_SESSION['current_user_id']);
    header('Location: login.php');
?>