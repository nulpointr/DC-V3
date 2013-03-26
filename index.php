<?php get_header(); ?>
	
	<div id="content">	
	<?php get_sidebar(); ?>	

	<div id="contentbg">
<?php $my_query = new WP_Query('showposts=1&author=2,3,4&cat=-45,-50,-526'); ?><?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<?php $exclude = get_the_ID(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">				<h2 class="posttitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				
				<div class="postauthor">
            		by <?php the_author_posts_link(); ?> on <?php the_date()?>                  
                </div>
				<div class="postentry">
							<?php
									if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) {
							the_post_thumbnail(array(560,372));
						} else {
							$postimage = get_post_meta($post->ID, 'post-image', true);
							if ($postimage) {
								echo '<img src="'.$postimage.'" alt="" />';
							}
						}?>
					<?php the_excerpt(); ?>
				</div>
				<div id="readfull"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">Continue reading <?php the_title(); ?></a></div>
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
	'posts_per_page' => 6,
	'paged'=>$paged,
	'author'=>4,
        'cat'=>'-526'
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
            <?php if($other): ?>
                    <div style="width: 100%; height: 1px;"></div>
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
