<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package VW Pet Shop
 */

get_header(); ?>

<?php do_action( 'vw_pet_shop_page_top' ); ?>

<div class="title-box">
    <div class="container">
        <h1><?php the_title();?></h1>
    </div>
</div>

<div id="content-vw" class="container">
    <div class="middle-align">       		
			<?php 
            while ( have_posts() ) : the_post(); ?>
            	<img src="<?php the_post_thumbnail_url('full'); ?>" width="100%">
                <?php the_content();?>
            <?php endwhile; // end of the loop. ?>
            <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                   comments_template();
                endif;
            ?>
        <div class="clear"></div>    
    </div>
</div>

<?php do_action( 'vw_pet_shop_page_bottom' ); ?>

<?php get_footer(); ?>