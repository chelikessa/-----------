<?php
    include 'core.php';
?>

        </main>
        <div class="empty">
            
        </div>
        <footer>
            <div class="footer">
                <a href="././index.php">
                    <div class="logo_footer">
                        <div class="img_logo_footer">
                            <img src="./assets/img/icons/search_footer.png" alt="logo">
                        </div>
                        ВикиПлагиат
                    </div>
                </a>
                <div class="footer_menu">
                    <a href="">Категории</a>
                    <!-- <a href="">О ВикиПлагиат</a> -->
                    <?php if(!isset($_SESSION['user'])): ?>
                    <a href="././form_for_moder.php">Стать модератором</a>
                    <?php else: ?>
                    <?php endif; ?>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>