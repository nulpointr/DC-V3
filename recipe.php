<?php /*
Template Name: recipe
*/
?>
<?php get_header(); ?>

	<div id="content">	<?php get_sidebar(); ?>
	<div id="contentbg">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="page" style="display:block;" id="post-<?php the_ID(); ?>">
			<h2 class="recipetitle"><?php the_title(); ?></h2>
			<div class="pageentry">
			 	<div id="categ_lists">
					<div id="cattest">
					<?php $categories = wp_list_categories('title_li=&show_count=1&echo=0&exclude=45,50,499,526');
					$categories = ereg_replace(' \(([0-9]+)\)', ' <span class="lighter-recipe">(\1)</span>', $categories);
					echo $categories; ?>
					</div>
				</div>
				<?php if(function_exists('selfserv_sexy')) { selfserv_sexy(); } ?>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<div id="pagecomment">
				    <?php comments_template(); ?>
				</div>
			</div>
		</div>

		
		<?php endwhile; else: ?>

		<div class="post">
			<h2 class="posttitle"><?php _e('Not Found') ?></h2>
			<div class="postentry"><p><?php _e('Sorry, no posts matched your criteria.'); ?></p></div>
		</div>

		<?php endif; ?>
		<div id="recipes">
			<?php 
				query_posts( 'cat=-45,-50, -499, -526&posts_per_page=-1');
				$counter = 1;
				
				while (have_posts()) : the_post(); 
			?>
				<?php if($counter % 3 == 0): ?>
					<div class="recipe_nopad">
				<?php else: ?>
					<div class="recipe">
				<?php endif; ?>
		        	<?php the_post_thumbnail(array(150,150)); ?>
		        	<h2 class="archtitle2">
		        		<a href="<?php the_permalink(); ?>"><?php the_title();?></a>
		        	</h2>
		        	<?php
		        		$excerpt = get_the_excerpt();
						
						$excerpt = substr($excerpt,0,50);
						echo $excerpt."<a href='".get_permalink()."'>...<span class='orange'>>></span></a>";
		        	?>
		       	</div>
		    <?php ++$counter ?>
	        <?php endwhile; ?>
	        <div style="clear:both"><?php paginate_links(); ?></div>
       	</div>
	</div>
	</div>


<?php get_footer(); ?>
