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

    $user = $link->query("SELECT * FROM `users` WHERE `status_user` = '1' AND `isAdmin` = '0'");
?>
<div class="container_block">
    <div class="page_application">
        <h2>Список модераторов</h2>
        <?php foreach($user as $key => $value): ?>
            <div class="application">
                <p>Фамилия: <b><?= $value ['surname'] ?></b></p>
                <p>Имя: <b><?= $value ['name'] ?></b></p>
                <p>Логин: <b><?= $value ['login'] ?></b></p>
                <p>Почта: <b><?= $value ['email'] ?></b></p>
                <p>О себе: <b><?= $value ['advantages'] ?></b></p>
                <form action="vendor/action/ban/ban.php" method="post">
                    <input type="hidden" name="id" value=<?= $value['id'] ?>>
                    <button name="ban">Заблокировать</button>
                </form>
            </div>
        <?php endforeach;?>
            <p style="color: green"><?php
                if(isset($_SESSION['success']['ban'])){
                    echo $_SESSION['success']['ban'];
                    unset ($_SESSION['success']['ban']);
                }
            ?></p>
    </div>
</div>
<?php
    include 'vendor/components/footer.php';
?>