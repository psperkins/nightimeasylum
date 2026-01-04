<h2 class="blog title"><?php the_title();?></h2>
<byline>
    <?php echo get_the_date('F j, Y', $post->ID); ?>&nbsp;|&nbsp;<?php the_author(); ?>
</byline>
<div class="blog body"><?php the_content(); ?></div>