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

    $category = $link -> query("SELECT * FROM `category` WHERE `status` = '1' ORDER BY `title`");
?>
<div class="container_block">
    <div class="page_category">
        <h2>Добавить категорию</h2>
        <div class="add_category">
            <h4>Перед добавлением категории ознакомьтесь со списком!</h4>
            <p>Введите название новой категории</p>
            <form action="vendor/action/category/add_category.php" method="post">
                <input type="text" name="title">
                <button name="add">Добавить категорию</button>
            </form>
            <p style="color: red"><?php
                if(isset($_SESSION['error']['empty'])){
                    echo $_SESSION['error']['empty'];
                    unset ($_SESSION['error']['empty']);
                }
            ?></p>
            <p style="color: red"><?php
                if(isset($_SESSION['error']['add'])){
                    echo $_SESSION['error']['add'];
                    unset ($_SESSION['error']['add']);
                }
            ?></p>
            <p style="color: green"><?php
                if(isset($_SESSION['success']['add'])){
                    echo $_SESSION['success']['add'];
                    unset ($_SESSION['success']['add']);
                }
            ?></p>
        </div>
        <div class="list_category">
            <?php
                foreach ($category as $key => $value):
            ?>
            <p><?= $value['title']?></p>
            <form action="update_category.php" method="post"></form>
            <?php
                endforeach;
            ?>
        </div>
    </div>
</div>
<?php
    include 'vendor/components/footer.php';
?>