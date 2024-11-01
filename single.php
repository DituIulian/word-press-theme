<?php
get_template_part('assets/parts/header');

if (have_posts()):
        while (have_posts()):
                the_post(); ?>
                <small><?php the_time('F jS, Y'); ?> by <?php the_author_posts_link(); ?></small>
                <h1><?php the_title(); ?></h1>

<?php
                the_content();

        endwhile;
endif;



get_template_part('assets/parts/sidebar');
get_template_part('assets/parts/footer');
