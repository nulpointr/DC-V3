<?php
function childtheme_mce_btns2($orig) {
return array('formatselect', 'styleselect', '|', 'pastetext', 'pasteword', 'removeformat', '|', 'outdent', 'indent', '|', 'undo', 'redo', 'wp_help', 'mymenubutton' );
}
add_filter( 'mce_buttons_2', 'childtheme_mce_btns2', 999 );
function childtheme_tiny_mce_before_init( $init_array ) {
$init_array['theme_advanced_styles'] = "Subtitle=post_subtitle;10px=ten_pixels;12px=twelve_pixels;14px=fourteen_pixels;16px=sixteen_pixels;18px=eighteen_pixels;20px=twenty_pixels;22px=twentytwo_pixels;24px=twentyfour_pixels";
return $init_array;
}
add_filter( 'tiny_mce_before_init', 'childtheme_tiny_mce_before_init' );

function add_fb_like(){
	return "<br /><a href='http://www.facebook.com/pages/Dancing-Carrots/265444700139396'><img src='".get_bloginfo('template_url')."/images/fblike.jpg'/></a> Like us on Facebook";
}

function dancing_carrots_custom_feed( $for_comments ) {
    $rss_template = get_template_directory() . '/feeds/dc-rss-feed.php';
    load_template( $rss_template );
}

remove_all_actions( 'do_feed_rss2' );
add_action( 'do_feed_rss2', 'dancing_carrots_custom_feed', 0, 0 );

function add_more($content){
	return $content."<a href='".get_permalink()."'> To view the full ".get_the_title()." Recipe click here <span class='orange'>>></span></a>".add_fb_like();
}

function short($content){
	return substr($content, 0,300)."...<a href='".the_permalink()."'>Read More</a>".add_fb_like();
}

add_filter("the_content_rss","short");
add_filter("the_excerpt_rss","add_more");

function featuredtoRSS($content) {
	global $post;
	
	if ( has_post_thumbnail( $post->ID ) ){
		$content = '' . get_the_post_thumbnail( $post->ID, 'medium', array( 'style' => 'float:left; margin:0 15px 15px 0;' ) ) . '' . $content;
	}
	return $content;
}
 
add_filter('the_excerpt_rss', 'featuredtoRSS');
add_filter('the_content_feed', 'featuredtoRSS');

function search_page(){
	if(is_search()){
		set_query_var('posts_per_page',100);
	}
}

//add_filter('pre_get_posts','search_page');

if ( function_exists('register_sidebars') ){
    register_sidebar(array('before_widget' => '', 'after_widget'  => ''));
	register_sidebar(array('name' => 'below_sidebar','before_widget' => '', 'after_widget'  => ''));
	register_sidebar(array('name' => 'below_post','before_widget' => '', 'after_widget'  => ''));
    register_sidebar(array('name' => 'top_banner','before_widget' => '', 'after_widget'  => ''));
}
add_filter('comments_template', 'legacy_comments');

function new_excerpt_more($more) {
       global $post;
	return '<a class="readmore" href="'. get_permalink($post->ID) . '">...<span class="orange">>></span></a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

function legacy_comments($file) {
	if(!function_exists('wp_list_comments')) 	$file = TEMPLATEPATH . '/legacy.comments.php';
	return $file;
}       
if ( function_exists( 'add_theme_support' ) )
add_theme_support( 'post-thumbnails' );
add_action('admin_menu', 'dancing_theme_page');

function dancing_theme_page ()
{
	if ( count($_POST) > 0 && isset($_POST['dancing_settings']) )
	{
		$options = array ('logo','desc','secdesc','foottext');
		foreach ( $options as $opt )
		{
			delete_option ( 'dancing_'.$opt, $_POST[$opt] );
			add_option ( 'dancing_'.$opt, $_POST[$opt] );	
		}			
	}
	add_theme_page('welcome', 'DancingCarrots Theme Options', '8', 'functions', 'editoptions','dancing_settings');	
}

function editoptions() {
?>
  <div class='wrap'>
  <h2>DancingCarrots Theme Options</h2>
  <form method="post" action="options.php">
<?php wp_nonce_field('update-options') ?>
  
    <p><strong>Logo Title</strong></p>
  <p><textarea name="dancing_logo" style="width:500px;"><?php echo get_option('dancing_logo'); ?></textarea></p>  
  
    <p><strong>Logo Description1</strong></p>
  <p><input type="text" name="dancing_desc" value="<?php echo get_option('dancing_desc'); ?>" size="60" /></p>  
    <p><strong>Logo Description2</strong></p>
  <p><input type="text" name="dancing_secdesc" value="<?php echo get_option('dancing_secdesc'); ?>" size="60" /></p>  
  
  <p><strong>Logo Image URL </strong>  Recommended image resolution 184 x 137.</p>
  <p><input type="text" name="logoURL" value="<?php echo get_option('logoURL'); ?>" size="60" /></p>  

    <p><strong>Footer Text</strong></p>
  <p><textarea name="dancing_foottext" style="width:500px;"><?php echo get_option('dancing_foottext'); ?></textarea></p>  

  <p><input type="submit" name="Submit" value="Update Options" /></p>
 
  
  <input type="hidden" name="action" value="update" />
  <input type="hidden" name="page_options" value="dancing_logo,dancing_desc,dancing_secdesc,logoURL,dancing_foottext" />
  </form>
  </div>
<?php
  }

add_action( 'init', 'register_my_menu' );
function register_my_menu() {
    register_nav_menu( 'primary-menu', __( 'Primary Menu' ) );
}