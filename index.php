<?php

    session_start();
    if (isset($_SESSION['mr_user'])) {
        header('Location:  ./view/index.php ');
        die;
    } else {
        header('Location:  ./login.php ');
        die;
    }
?>