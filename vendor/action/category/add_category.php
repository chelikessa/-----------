<?php
    session_start();
    include '../../components/core.php';

    if(isset($_POST['add'])){
        if(empty($_POST['title'])){
            $_SESSION['error']['empty'] = "Вы не заполнили поле!";
            header("location:".$_SERVER['HTTP_REFERER']);
        }else{
            $add = $link -> query("SELECT * FROM `category` WHERE `title` = '{$_POST['title']}'");
            if($add -> num_rows > 0){
                $_SESSION['error']['add'] = "Категория с таким названием уже существует!";
                header("location:".$_SERVER['HTTP_REFERER']);
            }else{
                $link -> query("INSERT INTO `category` (`status`, `title`) VALUES ('1', '{$_POST['title']}')");
                $_SESSION['success']['add'] = "Категория успешно добавлена!";
                header("location:".$_SERVER['HTTP_REFERER']);
            }
        }
    }
?>