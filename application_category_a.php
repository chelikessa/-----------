<?php
    session_start();
    include 'vendor/components/header.php';

    if(!isset($_SESSION['user'])){
        header("location: 404_angry.php");
    }
    else{
        if($_SESSION['user']['isAdmin'] != 1){
            header("location: 404_angry.php");
        }
    }

    $category = $link -> query("SELECT * FROM `category` WHERE `status` = '0' ORDER BY `title`");
?>
<div class="container_block">
    <div class="page_category">
        <h2>Заявки на добавление категории</h2>
        <div class="app_category">
            <p style="color: red"><?php
                if(isset($_SESSION['error']['empty'])){
                    echo $_SESSION['error']['empty'];
                    unset ($_SESSION['error']['empty']);
                }
            ?></p>
            <p style="color: red"><?php
                if(isset($_SESSION['error']['update'])){
                    echo $_SESSION['error']['update'];
                    unset ($_SESSION['error']['update']);
                }
            ?></p>
            <p style="color: green"><?php
                if(isset($_SESSION['success']['update'])){
                    echo $_SESSION['success']['update'];
                    unset ($_SESSION['success']['update']);
                }
            ?></p>
            <p style="color: green"><?php
                if(isset($_SESSION['success']['delete'])){
                    echo $_SESSION['success']['delete'];
                    unset ($_SESSION['success']['delete']);
                }
            ?></p>
            <p style="color: green"><?php
                if(isset($_SESSION['success']['add'])){
                    echo $_SESSION['success']['add'];
                    unset ($_SESSION['success']['add']);
                }
            ?></p>
            <?php
                foreach ($category as $key => $value):
            ?>
            <form action="vendor/action/category/application/answer.php" method="post">
                <div class="app_cat_sb">
                    <p><?= $value['title']?></p>
                    <div>
                        <input type="hidden" name="id" value="<?= $value['id']?>">
                        <input type="text" name="title">
                        <button name="update">Изменить</button>
                        <button name="add">Принять</button>
                        <button name="delete">Удалить</button>
                    </div>
                </div>
                <div class="app_cat_link">
                    <input type="text" name="link">
                    <button name="add_link">Добавить</button>
                </div>
            </form>
            <?php
                endforeach;
            ?>
        </div>
    </div>
</div>
<?php
    include 'vendor/components/footer.php';
?>