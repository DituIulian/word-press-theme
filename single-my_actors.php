<?php
get_template_part('assets/parts/header');

if (have_posts()):
    while (have_posts()):
        the_post(); ?>



        <div class="row gx-2">
            <div
                class="col-lg-3 col-md-6 mt-3 mb-3">

                <?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail('full', ['class' => 'img-fluid', 'alt' => 'poster']);
                } else { ?>
                    <img src="https://www.wpclipart.com/dl.php?img=/people/faces/anonymous/photo_not_available_BW_T.png" class="img-fluid">
                <?php } ?>


            </div>
            <div class="col-lg-9 col-md-6 mt-3">
                <div class="row">
                    <div class="col-auto">
                        <h1><?php echo the_title(); ?></h1>
                    </div>
                    <div class="col-auto">
                    </div>
                </div>


                <?php
                echo "<strong>Description: </strong> " . "Yet not set *"  . the_content();

                $connected = new WP_Query([
                    'relationship' => [
                        'id'   => 'movies_to_actors',
                        'to' => get_the_ID(),
                    ],
                    'nopaging'     => true,
                ]);
                if ($connected->have_posts()) { ?>

                    <div class='container'>
                        <div class='row'>
                            <?php echo __('<strong>Movies: </strong>', 'text_domain');

                            while ($connected->have_posts()) { ?>
                                <?php $connected->the_post(); ?>

                                <div class="col-lg-4 col-md-12 mt-3 d-flex align-items-stretch mb-3">
                                    <?php get_template_part('template-parts/my_movies/content', 'excerpt'); ?>
                                </div>

                        <?php
                            }
                        }
                        unset($connected);
                        ?>

                        </div>
                    </div>


            </div>
        </div>






<?php


    endwhile;
endif;



get_template_part('assets/parts/sidebar');
get_template_part('assets/parts/footer');
