<?php
/*
 * The file for displaying an attachment
 * 
 * @package WordPress
 * @subpackage Inception
 */
?>

<?php get_header(); //Load the header ?>

<section id="content">
		
		<section id="main" role="main">
			
			<?php the_post(); ?>
			
			<header class="page-header">
				<h1 class="page-title">
					<a href="<?php echo get_permalink($post->post_parent); ?>" title="<?php printf(__('Return to %s', 'inception'), wp_specialchars(get_the_title($post->post_parent), 1)); ?>" rev="attachment">
						<span class="meta-nav">&laquo;</span><?php echo get_the_title($post->post_parent) ?>
					</a>
				</h1>
			</header><!-- .page-header -->
			
			<?php //Display the post ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<header class="entry-header">
					<h2 class="entry-title">
						<?php the_title(); ?>
					</h2>
				</header><!-- .entry-header -->
				
				<div class="entry-content">
					<div class="entry-attachment">
						<?php if (wp_attachment_is_image($post->id)) : $att_image = wp_get_attachment_image_src($post->id, "medium"); ?>
							<p class="attachment">
								<a href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php the_title(); ?>" rel="attachment"><img src="<?php echo $att_image[0];?>" width="<?php echo $att_image[1];?>" height="<?php echo $att_image[2];?>"  class="attachment-medium" alt="<?php $post->post_excerpt; ?>" /></a>
                        	</p>
                        <?php else : ?>
                        	<a href="<?php echo wp_get_attachment_url($post->ID) ?>" title="<?php echo wp_specialchars( get_the_title($post->ID), 1 ) ?>" rel="attachment"><?php echo basename($post->guid) ?></a>
                        <?php endif; ?>
                    </div>
                    <div class="entry-caption">
                       	<?php if ( !empty($post->post_excerpt) ) the_excerpt(); ?>
                    </div>
                    <?php the_content( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'your-theme' )  ); ?>
                    <?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'your-theme' ) . '&after=</div>') ?>
				</div><!-- .entry-content -->

			</article><!-- #post-<?php the_ID(); ?> -->
			
			<nav id="nav_below" class="navigation">
				
			</nav><!-- #nav-below -->
			
			<?php comments_template('', true); //Load the comments ?>

		</section><!-- #main -->
		
		<?php get_sidebar(); //Load the sidebar ?>
	
</section><!-- #content -->

<?php get_footer(); //Load the footer ?>