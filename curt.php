<?php /*
Template Name: curt
*/
?>
<?php get_header(); ?>

	<div id="content">
		<?php get_sidebar(); ?>
	<div id="contentbg">
<?php $my_query = new WP_Query('showposts=1&author=3'); ?><?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<div id="postdate"><div id="date"><?php the_time('j'); ?></div><div id="month"><?php the_time('M'); ?> <?php the_time('Y'); ?> </div> </div>
				<h2 class="posttitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<div class="postauthor">
            		<p>In: <?php the_category(', ') ?> Posted by: <?php the_author_posts_link(); ?></p>                    
                </div>
				<div class="postentry">
							<?php
									if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) {
							the_post_thumbnail(array(548,548));
						} else {
							$postimage = get_post_meta($post->ID, 'post-image', true);
							if ($postimage) {
								echo '<img src="'.$postimage.'" alt="" />';
							}
						}?>
					<?php the_excerpt(); ?>
				</div>
				<div id="readfull"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">Continue reading <?php the_title(); ?></a></div>
				<div id="comm_coun"><span>{</span> <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php comments_number('0 comment', '1 comment', '% comments'); ?></a> <span>}</span></div>
				<div id="retweet" style="float:right; position:relative; right:30px; bottom:15px;"><?php if (function_exists('topsy_retweet_big')) echo topsy_retweet_big(); ?></div>
			</div>
	
		<?php endwhile; ?>


	
<div id="cj_index">
<?php
	global $post;
	global $wpdb;
    $limit = 6;
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$test = $wpdb->get_var("SELECT ID from $wpdb->posts WHERE post_author=3 AND post_type = 'post' AND post_status = 'publish' ORDER BY post_date DESC LIMIT 1");
	$args = array(
	'post__not_in' => array($test),
	'showposts=' => 6,
	'posts_per_page' => 6,
	'paged'=>$paged,	
	'author'=>3,
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
				<div id="readfull1"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">Read the full article</a></div>
			</div>
            <?php if($other): ?>
                    <div style="clear:both;"></div>
            <?php endif;?>
	
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
