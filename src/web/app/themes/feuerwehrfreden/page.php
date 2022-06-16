<?php get_header(); ?>

    <div id="main-container" class="container">
        <div class="row">
            <div class="col-12">
                <?php

                the_title('<h1 class="entry-title">', '</h1>');
                the_content();

                ?>
            </div>
        </div>
    </div>

<?php get_footer();
