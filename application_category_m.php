<?php
    session_start();
    include 'vendor/components/header.php';

    if(!isset($_SESSION['user'])){
        header("location: 404_angry.php");
    }

?>
<div class="container_block">
    <div class="page_category">
        <h2>Создание заявки на добавление категории</h2>
        <div class="add_category">
            <form action="vendor/action/category/application/create.php" method="post">
                <input type="text" name="title">
                <button name="send">Отправить</button>
            </form>
            <p style="color: red"><?php
                if(isset($_SESSION['error']['empty'])){
                    echo $_SESSION['error']['empty'];
                    unset ($_SESSION['error']['empty']);
                }
            ?></p>
            <p style="color: red"><?php
                if(isset($_SESSION['error']['send'])){
                    echo $_SESSION['error']['send'];
                    unset ($_SESSION['error']['send']);
                }
            ?></p>
            <p style="color: green"><?php
                if(isset($_SESSION['success']['send'])){
                    echo $_SESSION['success']['send'];
                    unset ($_SESSION['success']['send']);
                }
            ?></p>
        </div>
    </div>
</div>
<?php
    include 'vendor/components/footer.php';
?>