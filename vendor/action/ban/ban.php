<?php
    session_start();
    include '../../components/core.php';

    if(isset($_POST['ban'])){
        $link -> query("UPDATE `users` SET `status_user` = '2' 
        WHERE `id` = '{$_POST['id']}'");
        $_SESSION['success']['ban'] = "Модератор заблокирован!";
        header('location:'.$_SERVER['HTTP_REFERER']);
    }
?>