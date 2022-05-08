<?php get_header(); ?>

    <div id="main-container" class="container">
        <?php

        the_title('<h1 class="entry-title">', '</h1>');
        the_content();

        ?>
    </div>

<?php get_footer();
