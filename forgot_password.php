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
            <h2>Восстановление пароля</h2>
            <form action="vendor/action/password_recovery.php" method="post" class="form_reg">
                <p>Почта</p>
                <p id="help"></p>
                <input type="email" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-zA-Z]{2,4}">
                <button name="recovery">Отправить код на почту</button>
            </form>
        </div>
        <div class="session_res">
            <p style="color: red"><?php
                if(isset($_SESSION['error']['email'])){
                    echo $_SESSION['error']['email'];
                    unset ($_SESSION['error']['email']);
                }
            ?></p>
            <p style="color: red"><?php
                if(isset($_SESSION['error']['code'])){
                    echo $_SESSION['error']['code'];
                    unset ($_SESSION['error']['code']);
                }
            ?></p>
        </div>
    </div>
</div>
<script src="assets/script/check_email.js"></script>
<?php
    include 'vendor/components/footer.php';
?>