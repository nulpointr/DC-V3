<?php
/*
 * Template Name: Tips & Motivation
 */
?>
<?php get_header(); ?>
	
	<div id="content">	
	<?php get_sidebar(); ?>	

	<div id="contentbg">
<?php $my_query = new WP_Query('showposts=1&cat=499'); ?><?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<?php $exclude = get_the_ID(); ?>
			<div class="tip_mot" id="post-<?php the_ID(); ?>">
				<h2>100 Super Healthy Tips</h2>
				<div class="postauthor">
					Stay tuned: We're adding a tip each week until we get to 100
            	</div>			
				<div class="postentry tips_image">
							<?php
									if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) {
							the_post_thumbnail(array(560,372));
						} else {
							$postimage = get_post_meta($post->ID, 'post-image', true);
							if ($postimage) {
								echo '<img src="'.$postimage.'" alt="" />';
							}
						}?>
					<h2 class="posttitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<div class="postauthor">
            			<?php the_date()?>                  
                	</div>
					<?php echo strip_tags(substr(get_the_content(),0,180)); ?><a href="http://www.dancingcarrots.com/tips-and-strategies/"><span class="orange tip_link">  >></span></a>
					<div id="readfull1"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">Continue Reading</a></div>
				</div>
			</div>
	
		<?php endwhile; ?><div id="squiggle">&nbsp;</div>
<div id="indexscnd">
<?php
	global $post;
	global $wpdb;
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array(
	'post__not_in' => array($exclude),
	'showposts=' => 6,
	'posts_per_page' => -1,
	'paged'=>$paged,
	'cat'=>499
	);

    query_posts($args);
    $wp_query->is_archive = true; $wp_query->is_home = false;
	$other = true;
	
    ?>
	<?php if(have_posts()) : while (have_posts()) : the_post();?>
			<?php 
				if($other){
					$other = false;
			?>
				<div class="post1" id="post-<?php the_ID(); ?>">
			<?php 
				}else{
					$other = true;
			?>
				<div class="post2" id="post-<?php the_ID(); ?>">
			<?php } ?>
			
				<div class="postentry1">						
					<h2 class="posttitle1"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
							<?php
									if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) {
							the_post_thumbnail(array(244,168));
						} else {
							$postimage = get_post_meta($post->ID, 'post-image', true);
							if ($postimage) {
								echo '<img src="'.$postimage.'" alt="" width="300" height="200"/>';
							}
						}?>
					
					<?php the_excerpt(); ?>
				</div>
				<div id="readfull1"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">Continue Reading</a></div>
			</div>
	
		<?php endwhile; ?>

		<div class="page-navi">
		<?php posts_nav_link( "&#124;", "&lsaquo; Previous Page", "Next Page &rsaquo;" ); ?>
		</div>
		
	<?php else : ?>
		<div class="post">
			<h2 class="posttitle"><?php _e('Not Found') ?></h2>
			<div class="postentry"><p><?php _e('Sorry, no posts matched your criteria.'); ?></p></div>
		</div>

	<?php endif; ?>
	
</div>



	</div>
	</div>

<?php get_footer(); ?>
