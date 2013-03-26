<?php get_header(); ?>

	<div id="content">
		<?php get_sidebar(); ?>
	<div id="contentbg">
		
		<div id="archmain">
		<div id="categ_lists">
			<div id="cattest">
			<?php $categories = wp_list_categories('title_li=&show_count=1&echo=0&exclude=45,50');
			$categories = ereg_replace(' \(([0-9]+)\)', ' (\1)', $categories);
			echo $categories; ?>
			</div>
		</div>
	<?php if (have_posts()) : ?>

	<?php /* If this is a category archive */ if (is_category()) { ?>
		<h1 class="archtitle"><?php echo single_cat_title(); ?></h1>
		<p><?php echo category_description(); ?></p>
		<div class="green-separator">&nbsp;</div>

 		<?php /* If this is a tag archive */ } elseif ( function_exists ('is_tag') && (is_tag()) ) { ?>
		<p class="archtitle">Posts tagged &#8216;<?php echo single_tag_title(); ?>&#8217;</p>

	 <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<p class="archtitle">Archive for <?php the_time('jS F Y'); ?></p>

	 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<p class="archtitle">Archive for <?php the_time('F Y'); ?></p>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<p class="archtitle">Archive for <?php the_time('Y'); ?></p>

	  <?php /* If this is an author archive */ } elseif (is_author()) { 
	  $curauth = get_userdata(intval($author));?>

		<p class="archtitle"><?php echo ucwords($curauth->nickname);?>'s Posts</p>

		<?php } ?>
		<div id="archive">
			<?php 
				query_posts($query_string . '&nopaging=true'); 
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
	<?php else : ?>
		<div class="post">
			<h2 class="posttitle"><?php _e('Not Found') ?></h2>
			<div class="postentry"><p><?php _e('Sorry, no posts matched your criteria.'); ?></p></div>
		</div>

	<?php endif; ?>
	</div>
	</div>
<?php get_footer(); ?>
