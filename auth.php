<?php
    session_start();
    include 'vendor/components/header.php';

    if(isset($_SESSION['user'])){
        header("location: 404_angry.php");
    }
?>

<div class="container_block">
    <div class="page_reg">
        <div class="page_reg_content">
            <div class="help_auth_block">
                <h2>Авторизация</h2>
                <!-- <div class="img_help_auth">
                    <img src="assets/img/icons/help.png" alt="help"
                    title="Вы можете авторизоваться только после подтверждения администрацией Вашей заявки и получения пароля!">
                </div> -->
            </div>
                <p>Авторизация возможно только после подтверждения администрацией Вашей заявки и получения пароля!</p>
            <form action="vendor/action/auth.php" method="post" class="form_reg">
                <p>Почта</p>
                <input type="email" name="email">
                <div class="forgot__password">
                    <p>Пароль</p><a href="forgot_password.php">Забыли пароль?</a>
                </div>
                <input type="password" name="password">
                
                <button name="auth">Войти</button>
                
            </form>
        </div>
        <div class="session_res">
            <p style="color: red"><?php
                if(isset($_SESSION['error']['auth'])){
                    echo $_SESSION['error']['auth'];
                    unset ($_SESSION['error']['auth']);
                }
            ?></p>
            <p style="color: green"><?php
                if(isset($_SESSION['success']['email'])){
                    echo $_SESSION['success']['email'];
                    unset ($_SESSION['success']['email']);
                }
            ?></p>
            <p style="color: green"><?php
                if(isset($_SESSION['success']['new_password'])){
                    echo $_SESSION['success']['new_password'];
                    unset ($_SESSION['success']['new_password']);
                }
            ?></p>
            <p style="color: green"><?php
                if(isset($_SESSION['success']['new_login'])){
                    echo $_SESSION['success']['new_login'];
                    unset ($_SESSION['success']['new_login']);
                }
            ?></p>
            <p style="color: green"><?php
                if(isset($_SESSION['success']['save_new_pass'])){
                    echo $_SESSION['success']['save_new_pass'];
                    unset ($_SESSION['success']['save_new_pass']);
                }
            ?></p>
        </div>
    </div>
</div>

<?php
    include 'vendor/components/footer.php';
?>