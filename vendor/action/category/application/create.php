<?php
    session_start();
    include '../../../components/core.php';

    if(isset($_POST['send'])){
        if(empty($_POST['title'])){
            $_SESSION['error']['empty'] = "Вы не заполнили поле!";
            header("location:".$_SERVER['HTTP_REFERER']);
        }else{
            $create = $link -> query("SELECT * FROM `category` WHERE `title` = '{$_POST['title']}'");
            if($create -> num_rows > 0){
                $_SESSION['error']['send'] = "Категория с таким названием уже существует!";
                header("location:".$_SERVER['HTTP_REFERER']);
            }else{
                $link -> query("INSERT INTO `category` (`title`) VALUES ('{$_POST['title']}')");
                $_SESSION['success']['send'] = "Заявка успешно отправлена на рассмотрение администратору!";
                header("location:".$_SERVER['HTTP_REFERER']);
            }
        }
    }
?>