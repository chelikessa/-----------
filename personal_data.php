<?php
    session_start();
    include 'vendor/components/header.php';

    if(!isset($_SESSION['user'])){
        header("location: 404_angry.php");
    }

    $user = $link->query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['user']['id']}'");
?>
<div class="container_block">
    <div class="page_private">
        <h2>Личный кабинет</h2>
        <?php foreach($user as $key => $value): ?>
        <div class="personal_data">
            <p>Фамилия: <b><?= $value ['surname'] ?></b></p>
            <p>Имя: <b><?= $value ['name'] ?></b></p>
            <div class="personal_data_point">
                <p>Почта: <b><?= $value ['email'] ?></b></p>
                <p id="help"></p>
                <form action="vendor/action/update/email.php" method="post">
                    <input type="email" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-zA-Z]{2,4}" title="Введите корректный адрес своей электронной почты!">
                    <button name="email_btn">Изменить</button>
                </form>
                <p style="color: red"><?php
                    if(isset($_SESSION['error']['email'])){
                        echo $_SESSION['error']['email'];
                        unset ($_SESSION['error']['email']);
                    }
                ?></p>
                <p style="color: red"><?php
                    if(isset($_SESSION['error']['new_email'])){
                        echo $_SESSION['error']['new_email'];
                        unset ($_SESSION['error']['new_email']);
                    }
                ?></p>
            </div>
            <div class="personal_data_point">
                <p>Логин: <b><?= $value ['login'] ?></b></p>
                <form action="vendor/action/update/login.php" method="post">
                    <input type="login" name="login" pattern="[A-Za-z0-9]{5,}" title="Логин должен содержать не менее 5 латинских символов или цифр!">
                    <button name="login_btn">Изменить</button>
                </form>
                <p style="color: red"><?php
                    if(isset($_SESSION['error']['login'])){
                        echo $_SESSION['error']['login'];
                        unset ($_SESSION['error']['login']);
                    }
                ?></p>
                <p style="color: red"><?php
                    if(isset($_SESSION['error']['new_login'])){
                        echo $_SESSION['error']['new_login'];
                        unset ($_SESSION['error']['new_login']);
                    }
                ?></p>
            </div>
            <div class="personal_data_point">
                <p>Пароль:</p>
                <form action="vendor/action/update/password.php" method="post">
                    <input type="password" name="old_password" placeholder="Старый пароль">
                    <input type="password" name="new_password" placeholder="Новый пароль" pattern="[A-Za-z0-9]{6,}" title="Пароль должен содержать не менее 6 латинских символов или цифр!">
                    <button name="new_password_btn">Изменить</button>
                </form>
                <p style="color: red"><?php
                    if(isset($_SESSION['error']['empty'])){
                        echo $_SESSION['error']['empty'];
                        unset ($_SESSION['error']['empty']);
                    }
                ?></p>
                <p style="color: red"><?php
                    if(isset($_SESSION['error']['old_password'])){
                        echo $_SESSION['error']['old_password'];
                        unset ($_SESSION['error']['old_password']);
                    }
                ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<script src="assets/script/check_email.js"></script>
<?php
    include 'vendor/components/footer.php';
?>