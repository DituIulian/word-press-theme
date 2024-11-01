<?php
get_template_part('assets/parts/header');
get_template_part('assets/parts/sidebar');




// if (have_posts()) {
//     while (have_posts()) {
//         the_post();

//         // Post Content here
//         the_title(); // Această linie de cod va afișa titlul postării 
//         echo "<br>" . "<br>";
//     } // end while
// } // end if


if (have_posts()) : while (have_posts()) : the_post(); ?>

        <!-- Verificăm dacă postarea este în categoria 3. -->
        <!-- Dacă da, div-ul va primi clasa CSS "post-cat-three". -->
        <!-- În caz contrar, div-ul va primi clasa "post". -->

        <?php if (in_category('3')) : ?>
            <div class="post-cat-three">
            <?php else : ?>
                <div class="post">
                <?php endif; ?>


                <!-- Afișăm Titlul postării sub formă de link spre pagina postării. -->
                <!-- Permalink este link-ul spre postare, funcția îl determină automat. -->

                <h2>
                    <a
                        href="<?php the_permalink(); ?>"
                        rel="bookmark"
                        title="Permanent Link to <?php the_title_attribute(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>


                <!-- Afișăm data (November 16th, 2009 format) -->
                <!-- și link spre alte postări ale autorului. -->

                <small><?php the_time('F jS, Y'); ?> by <?php the_author_posts_link(); ?></small>



                <?php
                get_template_part('template-parts/post/content', 'excerpt'); ?>

                <!-- Afișăm categoriile din care face parte postarea, separate prin virgulă. -->

                <p class="postmetadata"><?php _e('Posted in'); ?> <?php the_category(', '); ?></p>
                </div> <!-- închidem primul div (cel din IF-ul pentru categoria 3) -->


                <!-- Oprim Loop-ul (dar mai avem și un "else:" mai jos). -->

            <?php endwhile;
    else : ?>


            <!-- Primul "if" a verificat dacă există postări pentru a fi afișate. -->
            <!-- Acest "else" indică ce să se afișeze dacă nu a fost găsită nici-o postare. -->
            <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>


            <!-- Aici CHIAR oprim Loop-ul. -->
        <?php endif;












    get_template_part('assets/parts/footer');
