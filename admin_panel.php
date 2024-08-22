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
?>
<div class="container_block">
    <div class="page_panel">
        <div class="page_panel_content">
            <h2>Админ-панель</h2>
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
                        <a href="create.php">
                            <button>Создать статью</button>
                        </a>
                        <a href="404_angry.php">
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
                        <a href="add_category.php">
                            <button>Добавить категорию</button>
                        </a>
                        <a href="list_category_a.php">
                            <button>Обновить/удалить категорию</button>
                        </a>
                        <a href="application_category_a.php">
                            <button>Заявки на добавление категории</button>
                        </a>
                    </div>
                </div>
                <div class="panel_mini">
                    <h4>Модераторы</h4>
                    <div class="panel_mini_btn">
                        <a href="application.php">
                            <button>Заявки на модераторов</button>
                        </a>
                        <a href="list_moders.php">
                            <button>Список модераторов</button>
                        </a>
                        <a href="black_list_moders.php">
                            <button>Black-list модераторов</button>
                        </a>
                        <a href="form_for_moder.php">
                            <button>Зарегистрировать модератора</button>
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