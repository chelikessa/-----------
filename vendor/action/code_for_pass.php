<?php
    session_start();
    include '../components/core.php';

    if(isset($_POST['code_btn'])){
        if(!empty($_POST['code'])){
            if($_POST['code'] == $_SESSION['password_recovery']){
                $_SESSION['success']['code'] = true;
                header("location: ../../new_password.php");
            }
            else{
                $_SESSION['error']['wrong_code'] = "Неверный код!";
                header('location:'.$_SERVER['HTTP_REFERER']);
            }
        }
        else{
        $_SESSION['error']['empty_code'] = "Заполните поле!";
        header("location:" .$_SERVER['HTTP_REFERER']);
        }
    }
?>