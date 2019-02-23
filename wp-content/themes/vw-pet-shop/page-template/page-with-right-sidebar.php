<?php
/**
 * Template Name:Page with Right Sidebar
 */

get_header(); ?>

<?php do_action( 'vw_pet_shop_pageright_top' ); ?>

<div class="title-box">
    <div class="container">
        <h1><?php the_title(); ?></h1>
    </div>
</div>

<div class="container">
    <div class="middle-align row">       
		<div class="col-md-8" id="content-vw" >
			<?php while ( have_posts() ) : the_post(); ?>                
                <img src="<?php the_post_thumbnail_url(); ?>" width="100%">
                <?php the_content();?>
                <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                       comments_template();
                    endif;
                ?>
            <?php endwhile; // end of the loop. ?>
        </div>
        <div class="col-md-4">
			<?php get_sidebar('page'); ?>
		</div>
        <div class="clear"></div>    
    </div>
</div>

<?php do_action( 'vw_pet_shop_pageright_bottom' ); ?>

<?php get_footer(); ?>