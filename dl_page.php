<?php 
/* 
 * Template Name: Download Page ?>
 */
?>
<?php 

function KeyExists($vkey){
    $verification_file = "studio54.php";
    $handle = fopen($verification_file,'r');
        
    while(!feof($handle)){
        $line = fgets($handle);
        $line = json_decode($line);
        $key = $line->vkey;

        if($key == $vkey){
            return TRUE;
        }
    }

    fclose($handle);

    return false;
}

$key = $_GET['v'];
?>
<?php get_header(); ?>
    <div id="content">
        <div style="padding-top: 100px;">
                <?php if(KeyExists($key)): ?>
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <center>
                            <img src="<?php bloginfo('template_url') ?>/images/downloadpic.png" alt="" title="healthy_snacks"/>
                            <br />
                            <a href="http://www.dancingcarrots.com/DC_30_Snacks.pdf">
                                <img src="<?php bloginfo('template_url') ?>/images/downloadbutton.png" alt="" title="healthy_snacks" style="margin-top: -170px; margin-left: 230px;"/>
                            </a>
                        </center>
                    <?php endwhile; endif; ?>
                <?php else: ?>
                    <div class="page" style="display:block;" id="post-<?php the_ID(); ?>">
                        <h2 class="pagetitle">Are you sure you registered?</h2>
                    </div>
            <?php endif;?>
        </div>
    </div>
<?php get_footer(); ?>
