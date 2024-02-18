<?php get_header(); ?>

    <div id="main-container" class="container">

        <?php
        the_title('<h1 class="entry-title">', '</h1>');
        ?>

        <?php if (get_fields()) { ?>
            <div class="row">
                <div class="col-12 mb-5">
                    <table class="fff-post-details">
                        <?php if ($value = get_field('fff-post-location')) { ?>
                            <tr>
                                <td>Einsatzort</td>
                                <td><?php echo $value ?></td>
                            </tr>
                        <?php } ?>
                        <?php if ($value = get_field('fff-post-team-strength')) { ?>
                            <tr>
                                <td>Mannschaftsstärke</td>
                                <td><?php echo $value ?></td>
                            </tr>
                        <?php } ?>
                        <?php if ($values = get_field('fff-post-vehicles')) { ?>
                            <tr>
                                <td>Eingesetzte Fahrzeuge</td>
                                <td>
                                    <?php
                                    echo implode(', ', $values);
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                        <?php if ($value = get_field('fff-post-begin')) { ?>
                            <tr>
                                <td>Einsatzbeginn</td>
                                <td><?php echo $value ?></td>
                            </tr>
                        <?php } ?>
                        <?php if ($value = get_field('fff-post-end')) { ?>
                            <tr>
                                <td>Einsatzende</td>
                                <td><?php echo $value ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        <?php } ?>

        <div class="row">
            <div class="col-12">
                <?php
                the_content();
                ?>
            </div>
        </div>
    </div>

<?php get_footer();
