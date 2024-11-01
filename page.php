<?php
get_template_part('assets/parts/header');
?>

<main class="container my-5">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            <h2 class="display-4"><?php the_title(); ?></h2>
            <div class="page-content">
                <?php the_content(); ?>
            </div>
    <?php endwhile;
    endif;
    ?>
</main>

<?php
get_template_part('assets/parts/sidebar');
get_template_part('assets/parts/footer');
