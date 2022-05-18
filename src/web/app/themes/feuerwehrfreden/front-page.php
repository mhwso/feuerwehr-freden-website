<?php
get_header();
?>

    <div id="main-slider" class="container-fluid">
        <?php
        echo do_shortcode('[smartslider3 slider="1"]');
        ?>
    </div>

    <div id="main-container" class="container">
        <?php
        the_title('<h1 class="entry-title text-center text-uppercase">', '</h1>');
        the_content();

        ?>
    </div>

    <div id="blog-container" class="container">
        <div class="row mb-5">

            <h2 class="text-uppercase mb-5">Aktuellste Beiträge</h2>

            <?php
            $posts = get_posts(['numberposts' => 9, 'category' => [1,5]]);

            if (count($posts) > 0) {
                for ($i = 0; $i < count($posts); $i++) {
                    $post = $posts[$i];
                    ?>

                    <div class="card-col col-12 col-md-6 col-lg-4">
                        <div class="card h-100 rounded-0">
                            <div class="card-custom-image card-img-top rounded-0"
                                 style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID, 'medium'); ?>')"></div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $post->post_title ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo $post->post_date ?></h6>
                                <p class="card-text"><?php echo get_the_excerpt($post->ID) ?></p>
                                <a href="<?php echo get_permalink($post->ID) ?>" class="btn btn-primary text-uppercase">Zum Beitrag</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>

<?php get_footer();
