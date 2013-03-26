<?php 
/* 
 * Template Name: Stats Page ?>
 */
?>
<?php 

function GetSubscribers(){
    $verification_file = "studio54.php";
    $handle = fopen($verification_file,'r');
    
    $total_subscribers = 0;
    
    while(!feof($handle)){
        $sub = fgets($handle);
        ++$total_subscribers;
    }
    
    fclose($handle);
    
    echo $total_subscribers - 1;
}

function GetEmails(){
    $email_file = "studio54.php";
    $handle = fopen($email_file,'r');
    
    while(!feof($handle)){
        $sub = json_decode( fgets($handle) );
        if($sub){
            echo "<div style='border: 1px solid black; width: 100%; padding: 10px;'>".$sub->email."</div>";
        }
    }
    
    fclose($handle);
}

?>
<?php get_header(); ?>
    <div id="content">
        <div style="padding-top: 100px;">
            <?php 
            
            get_currentuserinfo() ;
            global $user_level;
            
            if($user_level > 1): ?>
                <h1>You have <?php GetSubscribers() ?> subscribers so far...</h1>
                <?php GetEmails(); ?>
            <?php endif; ?>
        </div>
    </div>
<?php get_footer(); ?>
