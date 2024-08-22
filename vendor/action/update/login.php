<?php
    session_start();
    include '../../components/core.php';

        
    if(isset($_POST["login_btn"])){
        if(!empty($_POST['login'])){
            $users = $link -> query("SELECT * FROM `users` WHERE `login` = '{$_POST['login']}'");
            if($users -> num_rows > 0){
                $_SESSION['error']['new_login'] = "Пользователь с таким логином уже существует!";
                header("Location:".$_SERVER["HTTP_REFERER"]);
            }
            else{
                $link -> query("UPDATE `users` SET `login` = '{$_POST['login']}'
                WHERE `id` = '{$_SESSION['user']['id']}'");
                $_SESSION['success']['new_login'] = "Ваш логин изменен! Авторизуйтесь заново!";
                unset($_SESSION['user']);
                header('location: ../../../auth.php');
            }
        }
        else{
            $_SESSION['error']['login'] = "Вы не ввели новый логин!";
        }
        
    }
    header("Location:".$_SERVER['HTTP_REFERER']);
?>