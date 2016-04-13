<?php
/*
Plugin Name: Easy Date Update 
Plugin URI: http://www.longcheng24.com  
Description: Update weekly ad date and sneak peek date easily 
Version: 1.0  
Author: Long Cheng  
Author URI: http://www.longcheng24.com  
License: LC  
*/ 



/* When Active */ 
//register_activation_hook(__FILE__,'ci_install');   
 
/* When Deactive */ 
//register_deactivation_hook( __FILE__, 'ci_remove' );  
 
/*function ci_install() {  
   
 }
function ci_remove() {  
    
}  */
/* if WordPress dashboard */ 
if( is_admin() ) {  
    /*  hook admin_menu  */ 
    add_action('admin_menu', 'permv_menu');  
}  
 
function permv_menu() {  
    /* add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function);  */ 
    add_options_page('Welcome to Easy Date Update', 'Easy Date Update', 'administrator','post_mover', 'permv_html_page');  
} 
function permv_html_page() {  
?>  
    <div>  
        <h2>Post Mover</h2> 
        <p style="margin-top:30px"><p>
        <form method="post" name="perform">  
            <?php
				
				
				if ( 'Update Sneak Peek' == $_REQUEST['action'] ) {
					if(!get_option("sneak_peek_date")){
						add_option("sneak_peek_date");
						update_option("sneak_peek_date",$_REQUEST["spdate"]);
					}else{
						update_option("sneak_peek_date",$_REQUEST["spdate"]);
					}
				}
				
				if ( 'Update Weekly Ad' == $_REQUEST['action'] ) {
					if(!get_option("weekly_ad_date")){
						add_option("weekly_ad_date");
						update_option("weekly_ad_date",$_REQUEST["wadate"]);
					}else{
						update_option("weekly_ad_date",$_REQUEST["wadate"]);
					}
				}
            	
					
				
				
            ?>
           
            <p>
            	<b>Enter Sneak Peek Date<b><br />
                <input name="spdate" id="spdate">
            </p>
 
            <p>  
                <input type="submit" name="action" value="Update Sneak Peek" class="button-primary" />
            </p>  
            
             <p>
            	<b>Enter Weekly Ad Date<b><br />
                <input name="wadate" id="wadate">
            </p>
            
            <p>  
                <input type="submit" name="action" value="Update Weekly Ad" class="button-primary" />
            </p>  
            
        </form>
        
    </div>  
<?php  
} 
?>  
