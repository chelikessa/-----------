<?php
    include 'core.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ВикиПлагиат</title>
    <link rel="stylesheet" href="./assets/style/style.css">
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
</head>
<body>
    <div class="wrapper">
        <header>
            <div class="header">
                <a href="././index.php">
                    <div class="logo">
                        <div class="img_logo">
                            <img src="./assets/img/icons/lupa.png" alt="logo">
                        </div>
                        ВикиПлагиат
                    </div>
                </a>
                <div class="header_menu">
                    <a href="././index.php#category">Категории</a>
                    <!-- <a href="">О ВикиПлагиат</a> -->
                    <?php if(!isset($_SESSION['user'])): ?>
                        <a href="././form_for_moder.php">Стать модератором</a>
                        <a href="././auth.php">Войти</a>
                    <?php else: ?>
                        <a href="././moder_panel.php">Модер-панель</a>
                        <?php if($_SESSION['user']['isAdmin'] == '1'): ?>
                            <a href="././admin_panel.php">Админ-панель</a>
                        <?php endif; ?>
                        <a href="././logout.php">Выход</a>
                    <?php endif; ?>
                </div>
            </div>
        </header>
        <main>
        <!-- <div class="container_block"> -->

<!-- ДРУГИЕ БЛОКИ ПИХАТЬ ПРОСТО В КОНТЕЙНЕР_БЛОК -->
