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
            <h2>Новый пароль</h2>
            <form action="vendor/action/save_new_pass.php" method="post" class="form_reg">
                <p>Придумайте новый пароль</p>
                
                <input type="text" name="password" pattern="[A-Za-z0-9]{6,}" title="Пароль должен содержать не менее 6 латинских символов или цифр!">
                <button name="password_btn">Сохранить</button>
            </form>
        </div>
        <div class="session_res">
            <p style="color: red"><?php
                if(isset($_SESSION['error']['empty'])){
                    echo $_SESSION['error']['empty'];
                    unset ($_SESSION['error']['empty']);
                }
            ?></p>
            <p style="color: red"><?php
                if(isset($_SESSION['error']['empty_code'])){
                    echo $_SESSION['error']['empty_code'];
                    unset ($_SESSION['error']['empty_code']);
                }
            ?></p>
        </div>
    </div>
</div>
<?php
    include 'vendor/components/footer.php';
?>