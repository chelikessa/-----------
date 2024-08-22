<?php
    include 'vendor/components/header.php';

    $category = $link->query("SELECT * FROM `category` WHERE `status` = '1' ORDER BY `title`");
?>

    <div class="main_screen_bg">
        <div class="container_block">
            <div class="main_screen">
                <?php
                    if(!isset($_SESSION['user']['login'])){
                ?>
                <h1>Добро пожаловать!</h1>
                <?php
                    }else{
                ?>
                <h1>Добро пожаловать,  <?php echo $_SESSION['user']['login']?>!</h1>
                <?php    
                    }
                ?>
                <!-- <p>Что Вы хотите узнать сегодня?</p> -->
                <form action="" method="post">
                    <input type="search" name="search" placeholder="Что вы хотите узнать сегодня?">
                    <button name="search_btn">
                        <div class="img_search">
                            <img src="assets/img/icons/lupa.png" alt="search">
                        </div>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="container_block" id="category">
        <div class="category">
            <h2>Категории</h2>
            <div class="category_list">
                <ul>
                    <?php
                        foreach ($category as $key => $value):
                    ?>
                    <li><a href=""><?= $value['title']?></a></li>
                    <?php
                        endforeach;
                    ?>
                </ul>
            </div>
        </div>

<?php
    include 'vendor/components/footer.php';
?>