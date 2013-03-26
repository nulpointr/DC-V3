	<div id="sidebar">
		<?php $page_id = $post->ID; ?>
		<ul>	
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
			<?php endif; ?>
		</ul>
		<div id="below_sidebar">
			<?php dynamic_sidebar('below_sidebar'); ?>
		</div>
	</div>
	
<script type="text/javascript">
function emailText()
{
document.getElementById("emailtext").value='';
}
function emailBlur()
{
if(document.getElementById("emailtext").value.length == 0) {
document.getElementById("emailtext").value='Enter email address...';
}
}
</script>