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

    $user = $link->query("SELECT * FROM `users` WHERE `password` = '0' AND `status_user` = '0'");
    
?>
<div class="container_block">
    <div class="page_application">
        <h2>Заявки на модерацию</h2>
            <p style="color: green"><?php
                if(isset($_SESSION['success']['new__pass'])){
                    echo $_SESSION['success']['new__pass'];
                    unset ($_SESSION['success']['new__pass']);
                }
            ?></p>
            <p style="color: green"><?php
                if(isset($_SESSION['success']['text_no'])){
                    echo $_SESSION['success']['text_no'];
                    unset ($_SESSION['success']['text_no']);
                }
            ?></p>
        <?php foreach($user as $key => $value): ?>
            <div class="application">
                <p>Фамилия: <b><?= $value ['surname'] ?></b></p>
                <p>Имя: <b><?= $value ['name'] ?></b></p>
                <p>Логин: <b><?= $value ['login'] ?></b></p>
                <p>Почта: <b><?= $value ['email'] ?></b></p>
                <p>О себе: <b><?= $value ['advantages'] ?></b></p>
                <form action="vendor/action/application/yes.php" method="post">
                    <input type="hidden" name="id" value=<?= $value['id'] ?>>
                    <input type="hidden" name="email" value=<?= $value['email'] ?>>
                    <input type="hidden" name="new_password" value=<?= $value['password'] ?>>
                    <button name="yes_btn">Принять заявку</button>
                </form>
                <form action="vendor/action/application/no.php" method="post" id="no">
                    <input type="hidden" name="id" value=<?= $value['id'] ?>>
                    <input type="hidden" name="email" value=<?= $value['email'] ?>>
                    <textarea name="text_no" placeholder="Причина отказа" col="2" rows="5"></textarea>
                    <button name="no_btn">Отклонить заявку</button>
                </form>
                <p style="color: red"><?php
                    if(isset($_SESSION['error']['text_no'])){
                        echo $_SESSION['error']['text_no'];
                        unset ($_SESSION['error']['text_no']);
                    }
                ?></p>
            </div>
        <?php endforeach;?>
    </div>
</div>
<?php
    include 'vendor/components/footer.php';
?>