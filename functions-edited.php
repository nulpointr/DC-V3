<?php
if ( function_exists('register_sidebar') )
    register_sidebar();
    
add_filter('comments_template', 'legacy_comments');
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
?>