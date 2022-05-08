<footer id="footer">
    <div class="container">
        <?php
        wp_nav_menu(
                [
                        'menu' => 'footer',
                        'container' => '',
                        'theme_location' => 'footer',
                        'items_wrap' => '<ul id="footer-nav-menu" class="nav">%3$s</ul>'
                ]
        )
        ?>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
