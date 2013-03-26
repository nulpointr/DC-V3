<?php get_header(); ?>
	<div id="content">
		<?php get_sidebar(); ?>
	<div id="contentbg">
	<div id="indexscnd">
        <?php
        $search_query = $_GET['s'];
        $search_query = explode(' ',$search_query);
        $search = new WP_Query(array('tag_slug__in' => $search_query, 'posts_per_page'=> 100));
        ?>
	<?php if ($search->have_posts()) : ?>

		<h2 style="border-bottom:1px solid #74A354; font-weight:lighter; "><?php _e('Search') ?></h2>
		
		<p> Results for <em style="color:#E56420; font-style:italic; font-weight:bold;"><?php echo $_GET['s'] ?></em></p>

		<?php $other = true; ?>
		<?php while ($search->have_posts()) : $search->the_post(); ?>
				<?php 
					if($other){
						$other = false;
				?>
					<div class="post3" id="post-<?php the_ID(); ?>">
				<?php 
					}else{
						$other = true;
				?>
					<div class="post4" id="post-<?php the_ID(); ?>">
				<?php } ?>
				<h2 class="posttitle1"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<div class="postentry1">
							<?php
									if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) {
							the_post_thumbnail(array(244,168));
						} else {
							$postimage = get_post_meta($post->ID, 'post-image', true);
							if ($postimage) {
								echo '<img src="'.$postimage.'" alt="" />';
							}
						}?>
					<?php the_excerpt(); ?>
				</div>
				<div id="readfull1"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">Read the full article</a></div>
		</div>
			

		<?php endwhile; ?>

	<?php else : ?>
		<div class="post1">
			<h2 class="posttitle1"><?php _e('Not Found') ?></h2>
			<div class="postentry1"><p><?php _e('Sorry, no posts matched your criteria.'); ?></p></div>
		</div>
	<?php endif; ?>
	<div style="clear:both"></div>
</div>
	
	</div>
	</div>


<?php get_footer(); ?>
