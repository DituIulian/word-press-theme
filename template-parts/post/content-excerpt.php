 <!-- Afișăm conținutul (textul) postării într-un div. -->

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