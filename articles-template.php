<?php
/*
Template Name: Articles
*/
?>


<?php get_header(); ?>

	<div id="content">
		<?php get_sidebar(); ?>
	<div id="contentbg">
		
		<div class="page" style="display:block;">
			<h2 class="pagetitle">Articles</h2>
			<div class="pageentry">
						
                            <?php query_posts( 'cat=50', 'posts_per_page=5' ); ?>          
                        <?php while ( have_posts() ) : the_post();  ?>
          		<div class="per-article">
          		<h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
          		<?php the_excerpt(); ?>
          		</div> 
          		<?php endwhile; ?>
          		
			</div>
                        
                        <?php if ( $wp_query->max_num_pages > 1 ) : ?>
				<div class="page-navi">
				<?php posts_nav_link( "&#124;", "&lsaquo; Previous Page", "Next Page &rsaquo;" ); ?>
				</div>
			<?php endif; ?>

		</div>
	</div>
	</div>


<?php get_footer(); ?>