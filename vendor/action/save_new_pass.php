<?php
    session_start();
    include '../components/core.php';

    if(isset($_POST['password_btn'])){
        if(empty($_POST['password'])){
            $_SESSION['error']['empty'] = "Вы не заполнили поле!";
            header("location:".$_SERVER['HTTP_REFERER']);
        }
        else{
            $link -> query("UPDATE `users` SET `password` = '{$_POST['password']}'
            WHERE `email` = '{$_SESSION['email_for_update']}'");
            $_SESSION['success']['save_new_pass'] = "Ваш пароль изменен! Авторизуйтесь заново!";
            unset($_SESSION['user']);
            header('location: ../../auth.php');
            }
        }
?>