<div class="card">
    <?php
    if (has_post_thumbnail()) { ?>
        <?php the_post_thumbnail('full', ['class' => 'img-fluid', 'alt' => 'poster']); ?>
    <?php
    } else { ?>
        <img src=" https://ih1.redbubble.net/image.1861329650.2941/cposter,large,product,750x1000.2.jpg" class="img-fluid">
    <?php } ?>
    <div class="card-body ">
        <h5 class="card-title"><?php the_title(); ?></h5>
        <span class="card-subtitle text-primary"><?php echo get_the_term_list($post->ID, 'my_genres', '', ',  ');; ?></span>
        <p class="card-text">
            <?php
            echo wp_trim_words(get_the_content(), 30, '...');

            ?>
        </p>
    </div>
    <div class="card-footer">
        <a href="<?php echo get_permalink() ?>"> <button class="btn btn-success">Read More </button></a>
    </div>
</div>