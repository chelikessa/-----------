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
            <form action="vendor/action/code_for_pass.php" method="post" class="form_reg">
                <p>Введите код, отправленный на почту</p>
                <input type="text" name="code">
                <button name="code_btn">Восстановить пароль</button>
            </form>
        </div>
        <div class="session_res">
            <p style="color: red"><?php
                if(isset($_SESSION['error']['wrong_code'])){
                    echo $_SESSION['error']['wrong_code'];
                    unset ($_SESSION['error']['wrong_code']);
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