<?php
    session_start();
    include 'vendor/components/header.php';

    if(!isset($_SESSION['user'])){
        header("location: 404_angry.php");
    }

    $category = $link -> query("SELECT * FROM `category` WHERE `status` = '1' ORDER BY `title`");
?>
<div class="container_block">
    <div class="page_category">
        <h2>Список категорий</h2>
        <div class="list_category">
            <?php
                foreach ($category as $key => $value):
            ?>
            <p><?= $value['title']?></p>
            <?php
                endforeach;
            ?>
        </div>
    </div>
</div>
<?php
    include 'vendor/components/footer.php';
?>