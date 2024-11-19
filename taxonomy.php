<?php

// Apoi, afișăm taxonomiile "my_genres" și "my_years".

get_template_part('assets/parts/header');

if (have_posts()): ?>
    <h1> <?php single_term_title(); ?> </h1>
    <?php
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
            <div class="col-lg-9 col-md-6 mt-3">
                <div class="row">
                    <div class="col-auto">
                        <h1><?php echo the_title(); ?></h1>
                    </div>
                    <div class="col-auto">
                    </div>
                </div>

                <?php
                the_content();

                ?>
                <a href="<?php echo get_permalink() ?>"> <button class="btn btn-success buton-read-more-taxonomy">Read More </button></a>


            </div>
        </div>






<?php


    endwhile;
endif;



get_template_part('assets/parts/sidebar');
get_template_part('assets/parts/footer');
