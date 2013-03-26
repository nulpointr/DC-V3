</div> <!-- container -->
</div> <!-- wrapper --><!--
<div id="footer">
	<div id="wrapper">
		<div id="container">
			<div id="foot">
				<p>&#169; <?php echo date('Y');?> by Dancing Carrots. All rights reserved.<br><br> <br>
Curt and Jessica each provide health and nutrition information based on their own experience,<br> research, and opinions.  Neither speaks for the other and neither takes the place of your medical doctor. <br> The information contained on the Dancing Carrots website is provided for your general information only. <br> Consult your doctor before making any health decision.  <br>

</p>
				<div id="footbot">
				<p><?php echo get_option('dancing_foottext'); ?></p>
				</div>
			</div>-->
		</div><!-- container -->
	</div>  <!-- wrapper -->	<div style="clear:both"></div>
</div> <!-- footer -->
<?php wp_footer(); ?>


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-25682182-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<div id="popup_overlay">
    <div id="popup">
        <div id="signup_text">
            <p style="text-align: center; margin: 0px;">
                <input type="text" id="popup_email" value="Email Address" />
                <input type="submit" value="SUBMIT" id="popup_submit" />
            </p>
            <p id="popup_header">It's Easy!</p>
            <p id="popup_subheader">Just sign up for FREE</p>
            <p id="popup_sub">HERE's WHAT YOU'LL GET!</p>
            <ul id="popup_features">
                <li>EMAIL UPDATES <span>on New Recipes and the Latest Healthy News</span></li>
                <li>OUR TOP 30 HEALTHY SNACKS <span>on 1-page printable pdf with inspiring photos to keep on your fridge</span></li>
            </ul>
            
        </div>
        <div id="thankyou_text">
            <p id="popup_header">Thanks for registering!<br /></p>
            <p id="popup_subheader">A verification link has been sent to your inbox. Just click the link to verify your email address and start your download!!!<br /><br /></p>
        </div>
            <p style="text-align: center; margin: 0px; cursor: pointer;" id="exit_text">exit</p>
        <iframe name="subscribe_iframe" src="http://feedburner.google.com/fb/a/mailverify?uri=Dancingcarrots"></iframe>
    </div>
</div>
</body>
</html>
