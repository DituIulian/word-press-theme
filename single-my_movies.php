<?php
get_template_part('assets/parts/header');

if (have_posts()):
    while (have_posts()):
        the_post(); ?>
        <small><?php the_time('F jS, Y'); ?> by <?php the_author_posts_link(); ?></small>


        <div class="row gx-2">
            <div
                class="col-lg-3 col-md-6 mt-3 mb-3">

                <?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail('full', ['class' => 'img-fluid', 'alt' => 'poster']);
                } else { ?>
                    <img src="https://ih1.redbubble.net/image.1861329650.2941/cposter,large,product,750x1000.2.jpg" class="img-fluid">
                <?php } ?>


            </div>
            <div class=" col-lg-9 col-md-6 mt-3">
                <div class="row">
                    <div class="col-auto">
                        <h1><?php echo the_title(); ?></h1>
                    </div>

                    <div class="col-auto">



                    </div>
                </div>

                <p><?php
                    $year = get_the_term_list($post->ID, 'my_years', '<strong>Year: </strong>');
                    echo $year;
                    ?></p>
                <p><strong>Genres:</strong>
                    <span class="mx-3"><?php echo get_the_term_list($post->ID, 'my_genres', '', ',  '); ?></span>
                </p>
                <p><?php echo runtimePrettier(get_field('my_runtime')); ?></p>

                <?php
                $connected = new WP_Query([
                    'relationship' => [
                        'id'   => 'movies_to_directors',
                        'from' => get_the_ID(),
                    ],
                    'nopaging'     => true,
                ]);
                if ($connected->have_posts()) {
                    echo "<div class='actors'>";

                    echo __('<strong>Directors</strong>', 'text_domain') . ": ";

                    $i = 0;
                    while ($connected->have_posts()) {
                        $connected->the_post();

                        if ($i !== 0) {
                        }
                        echo  "<li>" . "<a href='" . get_the_permalink() . "'>" . get_the_title() . "</a>";
                        $i++;
                        echo "</li>";
                    }
                    wp_reset_postdata();
                    unset($i);

                    echo "</div>"; // div class="actors"
                }
                unset($connected);
                ?>

                <?php
                $connected = new WP_Query([
                    'relationship' => [
                        'id'   => 'movies_to_actors',
                        'from' => get_the_ID(),
                    ],
                    'nopaging'     => true,
                ]);
                if ($connected->have_posts()) {
                    echo "<div class='actors'>";

                    echo __('<strong>Actors</strong>', 'text_domain') . ": ";

                    $i = 0;
                    while ($connected->have_posts()) {
                        $connected->the_post();

                        if ($i !== 0) {
                        }
                        echo  "<li>" . "<a href='" . get_the_permalink() . "'>" . get_the_title() . "</a>";
                        $i++;
                        echo "</li>";
                    }
                    wp_reset_postdata();
                    unset($i);

                    echo "</div>"; // class="actors"
                }
                unset($connected);



                ?>


            </div>
        </div>






<?php
        the_content();

    endwhile;
endif;



get_template_part('assets/parts/sidebar');
get_template_part('assets/parts/footer');
