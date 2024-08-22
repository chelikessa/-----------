<?php
    session_start();
    include '../../components/core.php';

    if(isset($_POST['no_ban'])){
        $link -> query("UPDATE `users` SET `status_user` = '1' 
        WHERE `id` = '{$_POST['id']}'");
        $_SESSION['success']['no_ban'] = "Модератор разблокирован!";
        header('location:'.$_SERVER['HTTP_REFERER']);
    }
?>