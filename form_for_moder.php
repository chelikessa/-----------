<?php
    session_start();
    include 'vendor/components/header.php';
?>

<div class="container_block">
    <div class="page_reg">
        <div class="page_reg_content">
            <h2>Хотите стать модератором?</h2>
            <p>Тогда оставляйте заявку!</p>
            <p>Мы рассмотрим ее в течение нескольких дней и отправим ответ Вам на почту.</p>
            <form action="vendor/action/reg.php" method="post" class="form_reg">
                <p>Фамилия</p>
                <input type="text" name="surname" pattern="[а-яА-Я\s\-]+" title="Введите фамилию на русском языке">
                <p>Имя</p>
                <input type="text" name="name" pattern="[а-яА-Я\s\-]+" title="Введите имя на русском языке">
                <p>Почта</p>
                <p id="help"></p>
                <input type="email" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-zA-Z]{2,4}" title="Введите корректный адрес своей электронной почты!">
                <p style="color: red"><?php
                    if(isset($_SESSION['error']['login'])){
                        echo $_SESSION['error']['login'];
                        unset ($_SESSION['error']['login']);
                    }
                ?></p>
                <p>Логин</p>
                <input type="text" name="login" pattern="[A-Za-z0-9]{5,}" title="Логин должен содержать не менее 5 латинских символов или цифр!">
                <p>О себе</p>
                <textarea name="advantages" rows="5" cols="1"></textarea>
                <div class="checkbox">
                    <input type="checkbox" name="ch1">
                    <label for="done">Я принимаю <a href="privacy_policy.php">политику конфиденциальности</a></label>
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="ch2">
                    <label for="don">Я согласен(-на) <a href="data_processing.php">на обработку данных</a></label>
                </div>
                <p style="color: red"><?php
                    if(isset($_SESSION['error']['ch'])){
                        echo $_SESSION['error']['ch'];
                        unset ($_SESSION['error']['ch']);
                    }
                ?></p>
                <button name="reg">Отправить</button>
            </form>
            <!-- <a href="auth.php">Я уже являюсь модератором!</a> -->
        </div>
        <div class="session_res">
            <p style="color: green"><?php
                if(isset($_SESSION['success']['reg'])){
                    echo $_SESSION['success']['reg'];
                    unset ($_SESSION['success']['reg']);
                }
            ?></p>
            <p style="color: red"><?php
                if(isset($_SESSION['error']['reg'])){
                    echo $_SESSION['error']['reg'];
                    unset ($_SESSION['error']['reg']);
                }
            ?></p>
        </div>
    </div>
</div>
<script src="assets/script/check_email.js"></script>
<?php
    include 'vendor/components/footer.php';
?>