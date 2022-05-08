<?php

global $wp_query;
$modifications = [
        'category_name' => get_query_var('category_name')
];

$args = array_merge(
        $wp_query->query_vars,
        $modifications
);

$posts = query_posts($args);

$allPosts = get_posts([
        'numberposts' => -1,
        'post_type' => 'post',
        'category_name' => get_query_var('category_name'),
        'suppress_filters' => false
]);

define("DATES", array_column($allPosts, 'post_date'));

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
        // Check if there are any posts to display
        if (have_posts()) { ?>

        <div class="col-12">
            <h1 class="archive-title text-uppercase mb-5"><?php single_cat_title(); ?></h1>
        </div>

        <div class='col-12 post-filters'>
            <form class='post-filters'>
                <input type="hidden" value="foo" name="bar"/>
                <select name="orderby">
                    <?php
                    $orderby_options = array(
                            'post_date' => 'Nach Datum',
                            'post_title' => 'Nach Titel',
                    );

                    foreach ($orderby_options as $value => $label) {
                        echo "<option " . selected($_GET['orderby'] ?? null, $value) . " value='$value'>$label</option>";
                    }
                    ?>
                </select>
                <select name="order">
                    <?php
                    $order_options = array(
                            'DESC' => 'Absteigend',
                            'ASC' => 'Aufsteigend',
                    );

                    foreach ($order_options as $value => $label) {
                        echo "<option " . selected($_GET['order'] ?? null, $value) . " value='$value'>$label</option>";
                    }
                    ?>
                </select>
                <select name="year">
                    <?php

                    $order_options = [
                            'all' => 'Alle',
                    ];

                    foreach (DATES as $date) {
                        $datetime = new DateTime($date);
                        $year = $datetime->format('Y');
                        $order_options['' . $year] = $year;
                    }

                    foreach ($order_options as $value => $label) {
                        echo "<option " . selected($_GET['year'] ?? null, $value) . " value='$value'>$label</option>";
                    }
                    ?>
                </select>
                <input type='submit' value='Filter!'>
            </form>
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
                                <a href="<?php echo get_permalink() ?>" class="btn btn-primary text-uppercase">Zum Einsatz</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

                <?php } else { ?>
                    <p>Sorry, no posts matched your criteria.</p>
                <?php } ?>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-6">
                    <div class="nav-previous alignleft"><?php previous_posts_link('< Ältere Beiträge'); ?></div>
                </div>
                <div class="col-6 text-end">
                    <div class="nav-next alignright"><?php next_posts_link('Neuere Beiträge >'); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
