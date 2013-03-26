<?php get_header(); ?>
	<div id="content"> 
	<?php get_sidebar(); ?>
	<div id="contentbg">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php 
		    $the_author = $posts[0]->author;
			$the_category = get_the_category();
			$the_category = $the_category[0]->term_id;
		?>
		<div class="singpost" id="post-<?php the_ID(); ?>">
				<h2 class="posttitle"><?php the_title(); ?></h2>
				<div class="postauthor">
            		<p>by <?php the_author_posts_link(); ?> on <?php the_time('F'); ?> <?php the_time('j'); ?> ,<?php the_time('Y'); ?></p>                    
                </div>
				<?php $pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
				<a href="javascript:void((function(){var%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)})());">
					<img style="border: none;margin-top: 10px;" src="<?php bloginfo('template_url') ?>/pinit.png" alt="Pin It!" />
				</a>
				<div class="singpostentry">
							<?php
									if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) {
							the_post_thumbnail(array(560,372));
						} else {
							$postimage = get_post_meta($post->ID, 'post-image', true);
							if ($postimage) {
								echo '<img src="'.$postimage.'" alt="" />';
							}
						}?>
					<?php the_content(__('Continue reading'). " &#8216;" . the_title('', '', false) . "&#8217; &raquo;"); ?>
					<div id="below_post">
						<?php dynamic_sidebar('below_post'); ?>
					</div>
					<?php if(function_exists('selfserv_sexy')) { selfserv_sexy(); } ?>
						<div id="postcomment" style="position:relative; right:0px;">
						<?php comments_template(); ?>
						</div>
			</div>
	<?php endwhile; else: ?>
		
		<div class="post">
			<h2 class="posttitle"><?php _e('Not Found') ?></h2>
			<div class="postentry"><p><?php _e('Sorry, no posts matched your criteria.'); ?></p></div>
		</div>




	<?php endif; ?>
	<?php if($the_category == 45 || $the_category == 50): ?>
	<div id="last_blogs">
						<?php 
							query_posts("author=$the_author&cat=45,50&posts_per_page=6");
							$counter = 1;
							
							while (have_posts()) : the_post(); 
						?>
							<?php if($counter % 3 == 0): ?>
								<div class="recipe_nopad">
							<?php else: ?>
								<div class="recipe">
							<?php endif; ?>
								<?php the_post_thumbnail(array(150,150)); ?>
								<?php 
									$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(550,420), false, '' ); 
									if(!$src || $src = ""){
										if($the_author == 3):
										?>
										<img src="<?php bloginfo('template_url')?>/images/curtsblog.png" />
										<?php
										else:
										?>
										<img src="<?php bloginfo('template_url')?>/images/jessicas_blog.png" />
										<?php
										endif;
									}
								?>
								<h2 class="archtitle2">
									<a href="<?php the_permalink(); ?>"><?php the_title();?></a>
								</h2>
							</div>
						<?php ++$counter ?>
						<?php endwhile; ?>
						<div style="clear:both"><?php paginate_links(); ?></div>
					</div>
					
				</div>
				<?php endif; ?>
	</div>
	</div>

<?php get_footer(); ?>
	
