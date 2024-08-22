<?php
    session_start();
    include 'vendor/components/header.php';

    if(!isset($_SESSION['user'])){
        header("location: 404_angry.php");
    }
?>
<div class="container_block">
    <div class="page_panel">
        <div class="page_panel_content">
            <h2>Модер-панель</h2>
            <div class="btn_panel">
                <div class="panel_mini">
                    <div class="panel_mini_btn">
                        <a href="personal_data.php">
                            <button>Личный кабинет</button>
                        </a>
                    </div>
                </div>
                <div class="panel_mini">
                    <h4>Статьи</h4>
                    <div class="panel_mini_btn">
                        <a href="">
                            <button>Создать статью</button>
                        </a>
                        <a href="">
                            <button>Созданные тобой статьи</button>
                        </a>
                        <a href="">
                            <button>Отредактированные тобой статьи</button>
                        </a>
                        <a href="">
                            <button>Запрещенные для изменения статьи</button>
                        </a>
                        <a href="">
                            <button>Заблокированные статьи</button> 
                        </a>
                    </div>
                </div>
                <div class="panel_mini">
                    <h4>Категории</h4>
                    <div class="panel_mini_btn">
                        <a href="list_category_m.php">
                            <button>Категории</button>
                        </a>
                        <a href="application_category_m.php">
                            <button>Заявка на добавление категории</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include 'vendor/components/footer.php';
?>