<?php get_header(); ?>

	<div id="content">
		<?php get_sidebar(); ?>
	<div id="contentbg">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="page" style="display:block;" id="post-<?php the_ID(); ?>">
			<h2 class="pagetitle"><?php the_title(); ?></h2>
			<div class="pageentry">
				<?php the_content(); ?>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			</div>
		</div>

		
		<?php endwhile; else: ?>

		<div class="post">
			<h2 class="posttitle"><?php _e('Not Found') ?></h2>
			<div class="postentry"><p><?php _e('Sorry, no posts matched your criteria.'); ?></p></div>
		</div>

		<?php endif; ?>

	</div>
	</div>


<?php get_footer(); ?>
