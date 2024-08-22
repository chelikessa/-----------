<?php
    session_start();
    include 'vendor/components/header.php';
?>
<div class="container_block">
    <div class="page_404">
        <span>ERROR 404</span>
        <div class="page_404_center">
            <p>Эй! Как ты здесь оказался!!</p>
            <img src="assets/img/images/angry.jpg" alt="angry">
            <a href="index.php">Сбежать на главную</a>
        </div>
    </div>
</div>
<?php
    include 'vendor/components/footer.php';
?>