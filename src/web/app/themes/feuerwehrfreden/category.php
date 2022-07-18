<?php
get_header();
?>

<div id="main-container" class="container">

    <div class="row">
        <div class="col-12">
            <?php get_sidebar('category'); ?>
        </div>
    </div>

    <div class="row">
        <?php
        if (have_posts()) { ?>

        <div class="col-12">
            <h1 class="archive-title text-uppercase mb-5"><?php single_cat_title(); ?></h1>
        </div>

        <div class="col-12">
            <div class="row">
                <?php
                while (have_posts()) : the_post(); ?>
                    <div class="card-col col-12 col-md-6 col-lg-4">
                        <div class="card h-100 rounded-0">
                            <div class="card-custom-image card-img-top rounded-0"
                                 style="background-image: url('<?php echo get_the_post_thumbnail_url(null, 'medium'); ?>')"></div>
                            <div class="card-body">
                                <h5 class="card-title"><?php the_title() ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?php the_time('j. F Y') ?></h6>
                                <p class="card-text"><?php echo get_the_excerpt() ?></p>
                                <a href="<?php echo get_permalink() ?>" class="btn btn-primary text-uppercase">Zum Beitrag</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

                <?php } else { ?>
                    <p>Es wurden leider keine passenden Beiträge gefunden</p>
                <?php } ?>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-6">
                    <div class="nav-next alignleft"><?php previous_posts_link('< Neuere Beiträge'); ?></div>
                </div>
                <div class="col-6 text-end">
                    <div class="nav-previous alignright"><?php next_posts_link('Ältere Beiträge >'); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
