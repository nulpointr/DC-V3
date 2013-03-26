<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php if(is_home()):?>
<title><?php echo get_bloginfo ('description'); ?> from <?php bloginfo('name'); ?></title>
<?php else: ?>
<title><?php wp_title(); ?> <?php bloginfo('name'); ?></title>
<?php endif; ?>
<meta name="keywords" content="Quick,and,easy,vegetarian,recipes" />
<meta name="description" content="Find quick and easy vegetarian recipes at Dancing Carrots. We have a great collection of healthy reacipes that you are sure to love. Browse our recipes today!" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/print.css" type="text/css" media="print" />
<link rel="icon" typle="image/png" href="<?php echo bloginfo('template_url'); ?>/images/favicon.png" />
<script src="<?php echo bloginfo('template_url'); ?>/js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="<?php echo bloginfo('template_url'); ?>/js/cufon.js" type="text/javascript"></script>
<script src="<?php echo bloginfo('template_url'); ?>/js/cardo.cufonfonts.js" type="text/javascript"></script>
<script src="<?php echo bloginfo('template_url'); ?>/js/cufon-settings.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_url'); ?>/js/main.js"></script>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
<script type="text/javascript">
    (function ($) {
        $(document).ready(function () {
            $('.singpostentry a').prop("target", "_blank");

            $('#categ_lists li').each(function () {
                var linktext = $(this).html();

                linktext = linktext.replace("Recipes", "<span class='lighter-recipe'>Recipes</span>");
                linktext = "<h1 class='recipe-category'>" + linktext + "</h1>";

                $(this).html(linktext);
            });

            $("#comment_link").click(function () {
                $("#respond12").slideToggle(); ''
            });

            $("#signup_image").click(function () {
                $("#popup_overlay").fadeIn();
            });

            $("#exit_text").click(function () {
                $("#popup_overlay").fadeOut();
            });

            $("#popup_email").click(function () {
                if ($(this).val() == 'Email Address') {
                    $(this).val('');
                }
            });

            $("#popup_submit").click(function () {
                var email_address = $("#popup_email").val();

                console.log(email_address);

                var mapForm = document.createElement("form");
                mapForm.target = "subscribe_iframe";
                mapForm.method = "POST"; // or "post" if appropriate
                mapForm.action = "http://feedburner.google.com/fb/a/mailverify?uri=Dancingcarrots";
                var mapInput = document.createElement("input");
                mapInput.type = "text";
                mapInput.name = "email";
                mapInput.value = email_address;
                mapForm.appendChild(mapInput);

                var mapHidden = document.createElement("input");
                mapInput.type = "hidden";
                mapInput.name = "uri";
                mapInput.value = "Dancingcarrots";
                mapForm.appendChild(mapHidden);

                var mapLoc = document.createElement("input");
                mapInput.type = "hidden";
                mapInput.name = "loc";
                mapInput.value = "en_us";
                mapForm.appendChild(mapInput);
                document.body.appendChild(mapForm);

                var popup = window.open('http://feedburner.google.com/fb/a/mailverify?uri=Dancingcarrots', 'popupwindow', 'scrollbars=yes,width=550,height=520');

                if (popup == null || typeof (popup) == 'undefined') {
                    alert("Please turn off your popuop blocker to subscribe");
                } else {
                    mapForm.submit();
                    $.get('signup.php', { email: email_address }, function (data) {
                        console.log(data);
                        $("#signup_text").fadeOut(function () {
                            $("#thankyou_text").fadeIn();
                            $("#popup_overlay").fadeOut();
                        });
                    });
                }
            });
        });
    })(jQuery);
</script>
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "ur-fa66e4a5-c7a8-fa1d-47aa-6b2e7ff5823f"}); </script>
</head>

<body>
	<div id="top_adspace">
		<div id="logo"><img src="<?php bloginfo('template_url') ?>/images/dc_tag.png"/></div>
		<div id="subscribe_form">
			<div id="forms">
                            <img id="signup_image" src="<?php bloginfo(template_url) ?>/images/sign_up.png" />
			</div>	
		</div>
		<div id="top_banner">
			<h1>
				Quick &amp; Easy Vegetarian and Healthy Recipes
			</h1>
			<div id="top_banner_ad">
				<?php dynamic_sidebar('top_banner'); ?>
			</div>
		</div>
	</div>
<div id="wrapper">	
	<div id="header_wrapper">		
		<div id="header">
                    <div id="burst">
                        <img id="burst_image" src="<?php bloginfo('template_url'); ?>/images/burst.png" />
                    </div>
                    <div id="sitename">						
                            <img src="<?php bloginfo('template_url'); ?>/images/dcheadertop.png" alt="Quick and Easy Vegetarian Recipes"/>
                            <img src="<?php bloginfo('template_url'); ?>/images/dcheaderbot.png" alt="Quick and Easy Vegetarian Recipes, Healthy Recipes, and Other Groovy Ideas"/>			
                    </div>	
		</div>		
		<div id="navigation">			
			<div id="nav_wrapper">				
				<?php get_search_form(); ?>				
				<?php	    			
				wp_nav_menu( 	    					
				array( 		    						
				'menu_id'			=> 'nav',		    						
				'menu_class'		=> 'nav1',		    						
				'theme_location' 	=> 'primary-menu',		    					
				) 	    			
				); 			    
				?>			
			</div>		
		</div>	
	</div>
	<div id="container">