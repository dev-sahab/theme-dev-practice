<?php get_header(); ?>


<div class="container">
    <?php the_post_thumbnail(); ?>
    <h2><?php the_title(); ?></h2>
    <p><?php the_content(); ?></p>


</div>

<?php get_footer(); ?>