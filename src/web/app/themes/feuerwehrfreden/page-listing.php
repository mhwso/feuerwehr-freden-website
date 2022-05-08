<?php

$params = [
        'numberposts' => -1,
        'post_type' => 'post',
        'category' => $category,
        'suppress_filters' => false
];

$posts = get_posts($params);
$dates = array_column($posts, 'post_date');

if (isset($_GET['filter_year']) && $_GET['filter_year'] !== '' && $_GET['filter_year'] !== 'all') {
    $params['year'] = $_GET['filter_year'];
}

if (isset($_GET['filter_order']) && $_GET['filter_order'] !== '') {
    $params['order'] = $_GET['filter_order'];
}

if (isset($_GET['filter_orderby']) && $_GET['filter_orderby'] !== '') {
    $params['orderby'] = $_GET['filter_orderby'];
}

$posts = get_posts($params);

get_header();

?>

    <div id="main-container" class="container">
        <div class="row">
            <div class="col-12">
                <?php
                the_title('<h1 class="entry-title">', '</h1>');
                the_content();
                ?>
            </div>
            <div class='col-12 post-filters'>
                <form class='form'>

                    <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                        <div class="col">
                            <select name="filter_orderby" class="form-select">
                                <?php
                                $orderby_options = array(
                                        'post_date' => 'Nach Datum',
                                        'post_title' => 'Nach Titel',
                                );

                                foreach ($orderby_options as $value => $label) {
                                    echo "<option " . selected($_GET['filter_orderby'] ?? null, $value) . " value='$value'>$label</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <select name="filter_order" class="form-select">
                                <?php
                                $order_options = array(
                                        'DESC' => 'Absteigend',
                                        'ASC' => 'Aufsteigend',
                                );

                                foreach ($order_options as $value => $label) {
                                    echo "<option " . selected($_GET['filter_order'] ?? null, $value) . " value='$value'>$label</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <select name="filter_year" class="form-select">
                                <?php

                                $order_options = [
                                        'all' => 'Alle',
                                ];

                                foreach ($dates as $date) {
                                    $datetime = new DateTime($date);
                                    $year = $datetime->format('Y');
                                    $order_options['' . $year] = $year;
                                }

                                foreach ($order_options as $value => $label) {
                                    echo "<option " . selected($_GET['filter_year'] ?? null, $value) . " value='$value'>Datum: ".$label."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <input class="btn btn-primary" type='submit' value='Filtern'>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12">
                <div class="row">
                    <?php
                    foreach ($posts as $post) { ?>
                        <div class="card-col col-12 col-md-6 col-lg-4">
                            <div class="card h-100 rounded-0">
                                <div class="card-custom-image card-img-top rounded-0"
                                     style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID, 'medium'); ?>')"></div>
                                <div class="card-body">
                                    <h5 class="card-title"><?php the_title() ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?php the_time('j. F Y') ?></h6>
                                    <p class="card-text"><?php echo get_the_excerpt() ?></p>
                                    <a href="<?php echo get_permalink($post->ID) ?>" class="btn btn-primary text-uppercase">Zum Einsatz</a>
                                </div>
                            </div>
                        </div>
                    <?php }; ?>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();
