<div class="card">
    <?php
    if (has_post_thumbnail()) { ?>
        <?php the_post_thumbnail('full', ['class' => 'img-fluid', 'alt' => 'poster']); ?>
    <?php
    } else { ?>
        <img src=" https://ih1.redbubble.net/image.1861329650.2941/cposter,large,product,750x1000.2.jpg" class="img-fluid">
    <?php } ?>
    <div class="card-body">
        <h5 class="card-title"><?php the_title(); ?></h5>
        <span class="card-subtitle text-primary"><?php echo get_the_term_list($post->ID, 'my_genres', '', ',  ');; ?></span>
        <p class="card-text">

            <?php
            do_action('trim_with_brackets');
            ?>

        </p>
    </div>
    <div class="card-footer">
        <a href="<?php echo get_permalink() ?>"> <button class="btn btn-success buton-read-more-carduri">Read More </button></a>
    </div>
</div>