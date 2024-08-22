<?php
    session_start();
    include '../../components/core.php';

    if(isset($_POST['update'])){
        if(empty($_POST['title'])){
            $_SESSION['error']['empty'] = "Вы не заполнили поле!";
            header('location:'.$_SERVER['HTTP_REFERER']);
        }else{
            $add = $link -> query("SELECT * FROM `category` WHERE `title` = '{$_POST['title']}'");
            if($add -> num_rows > 0){
                $_SESSION['error']['update'] = "Категория с таким названием уже существует!";
                header("location:".$_SERVER['HTTP_REFERER']);
            }else{
                $link -> query("UPDATE `category` SET `title` = '{$_POST['title']}' WHERE `id` = '{$_POST['id']}'");
                $_SESSION['success']['update'] = "Категория успешно изменена";
                header('location:'.$_SERVER['HTTP_REFERER']);
            }
        }
    }
    if(isset($_POST['delete'])){
        $link -> query("DELETE FROM `category` WHERE `id` = '{$_POST['id']}'");
        $_SESSION['success']['delete'] = "Категория успешно удалена";
        header('location:'.$_SERVER['HTTP_REFERER']);
    }
?>