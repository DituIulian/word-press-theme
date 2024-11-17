<div class="card">
    <img class=" card-img-top img-thumbnail " src="<?php echo $movie['posterUrl']; ?>" alt="<?php echo $movie['title']; ?>">
    <div class="card-body ">
        <h5 class="card-title"><?php echo $movie['title']; ?></h5>
        <span class="card-subtitle text-primary"><?php echo implode(", ", $movie['genres']); ?></span>
        <p class="card-text">
            <?php
            $limitaCaractere = 100;
            if (strlen($movie['plot']) <= $limitaCaractere && strlen($movie['plot']) != 0) {
                echo ($movie['plot']);
            } else {
                $rezultatFix =  substr($movie['plot'], 0, $limitaCaractere);
                echo $rezultatFix . " ...";
            }

            ?>
        </p>
    </div>
    <div class="card-footer">
        <a href="movie.php?movie_id=<?php echo $movie['id']; ?>"> <button class="btn btn-success">Read More </button></a>
    </div>
</div>



<div class="entry">
    <?php
    if (is_single()) {
        // Afișează întregul conținut dacă este o postare individuală
        the_content();
    } else {
        // Afiseaza doar primele 45 de cuvinte pentru a nu incarca pagina
        echo wp_trim_words(get_the_content(), 45, '...');
    } ?>
</div>