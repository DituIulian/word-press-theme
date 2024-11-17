<?php
get_template_part('assets/parts/header');
get_template_part('assets/parts/sidebar');


?>

<div class="container ">
    <div class="row">
        <?php
        if (have_posts()) : while (have_posts()) : the_post(); ?>

                <div class="col-lg-4 col-md-6 mt-3 d-flex align-items-stretch">
                    <?php
                    get_template_part('template-parts/my_movies/content', 'excerpt');
                    ?>
                </div>

            <?php endwhile;
        else :
            ?>

            <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>

        <?php endif; ?>

    </div>
</div>
<?php
get_template_part('assets/parts/footer');
