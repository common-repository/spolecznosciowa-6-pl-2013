<?php
/*
Plugin Name: Społecznościowa 6 PL 2013
Plugin URI: http://wp.pece.pl/
Description: Najszybsza i najmniej obciążająca wtyczka społecznościowa zawierająca serwisy: Facebook, Twitter, Google+, Wykop i Naszą Klasę.
Author: netporadnik.pece.pl
Version: 2.0.6
Author URI: http://netporadnik.pece.pl/
*/


/*  
Wtyczka wykorzystuje kod pluginu Simple Social Buttons v.1.0 autora Paweła Rabinek http://blog.rabinek.pl/simple-social-buttons/
*/

//ustawienia ścieżki folderu
define( 'wkom_folder' , WP_PLUGIN_URL . '/' . str_replace(basename( __FILE__) , "" , plugin_basename(__FILE__) ) );

function wkomsp_include_css() { ?>

<!-- społecznościowa 6 pl http://wp.pece.pl -->
<style type="text/css">
#wkomimg a {
float:left;
}

#wkomimg img {
border:none;margin:0;padding:0;
margin-right:3px;
 }
#wkomimg img:hover {
 filter: alpha(opacity=70);
-moz-opacity: 0.7;
opacity: 0.7;
 }
</style>
<!-- End społecznościowa 6 pl wp.pece.pl -->

<?php }

add_action('wp_head', 'wkomsp_include_css');


//insert the buttons after post contents
function wkomsp_insert_buttons($content) {

   if(!wkomsp_where_to_insert()) {
      return $content;
   }
   
   
    global $post;  
    // pobieranie linku z postu  
    $link = get_permalink(); 
      
    // pobieranie tytułu z postu  
    $tytul = strip_tags(get_the_title());  
      
    // pobieranie pierwszych 300 znaków z postu
     $opis = urlencode(substr(strip_tags($post->post_content), 0, 300)); 
   
   // get settings from database
   //serwisy
   $wkomsp_facebook = get_option('wkomsp_facebook'); 
   $wkomsp_google = get_option('wkomsp_google'); 
   $wkomsp_twitter = get_option('wkomsp_twitter'); 
   $wkomsp_nk = get_option('wkomsp_nk'); 
   $wkomsp_wykop = get_option('wkomsp_wykop'); 
   $wkomsp_opis = get_option('wkomsp_opis'); 
   $wkomsp_opistext = get_option('wkomsp_opistext');  
   
   
   //opcje
   
   $wkomsp_beforepost = get_option('wkomsp_beforepost'); 
   $wkomsp_afterpost = get_option('wkomsp_afterpost'); 

   $wkomsp_beforepage = get_option('wkomsp_beforepage'); 
   $wkomsp_afterpage = get_option('wkomsp_afterpage'); 
      
   $wkomsp_beforearchive = get_option('wkomsp_beforearchive'); 
   $wkomsp_afterarchive = get_option('wkomsp_afterarchive'); 

// kod wyswietlania
   $wkomsp_buttonscode = '<div id="wkomimg" style="clear:both;margin-right: auto">';
   
   if($wkomsp_opis) { 
	if($wkomsp_opistext=='') { $wkomsp_opistext='Udostępnij na:'; };
   
      $wkomsp_buttonscode .= '<span style="font-size:14px"><strong>'.$wkomsp_opistext.'</strong></span><br />';
   }

   if($wkomsp_facebook) { 
      $wkomsp_buttonscode .= '<a href="http://www.facebook.com/share.php?u='.$link.'&t='.$tytul.'" target="_blank" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;"><img src="'.wkom_folder.'ikony/facebook24.png" title="Udostępnij na Facebooku" style="border-radius: 3px;box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);" /></a>';
   }
   if($wkomsp_google) { 
      $wkomsp_buttonscode .= '<a href="https://plus.google.com/share?url='.$link.'" target="_blank" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;"><img src="'.wkom_folder.'ikony/google24.png" title="Udostępnij na Google+" style="border-radius: 3px;box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);" /></a>';
   }
   if($wkomsp_twitter) { 
      $wkomsp_buttonscode .= '<a href="http://www.twitter.com/home?status='.$tytul.' - '.$link.'" target="_blank" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;"><img src="'.wkom_folder.'ikony/twitter24.png" title="Udostępnij na Twitterze" style="border-radius: 3px;box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);" /></a>';
   }
   if($wkomsp_nk) { 
      $wkomsp_buttonscode .= '<a href="http://nk.pl/sledzik?shout='.$link.'" target="_blank" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;"><img src="'.wkom_folder.'ikony/nk24.png" title="Udostępnij na Śledziku" style="border-radius: 3px;box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);" /></a>';
   }
   if($wkomsp_wykop) { 
      $wkomsp_buttonscode .= '<a href="https://www.wykop.pl/dodaj?url='.$link.'" target="_blank" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;"><img src="'.wkom_folder.'ikony/wykop24.png" title="Udostępnij na Wykopie" style="border-radius: 3px;box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);" /></a>';
   }

   $wkomsp_buttonscode .= '<a href="http://wp.pece.pl" target="_blank"><img src="'.wkom_folder.'ikony/wt4.gif" title="Pobierz Społecznościową 6 PL 2013 dla WordPressa" style="background:none;width:8px;box-shadow:none;margin-bottom:16px;" /></a></div>
   <div style="clear:both;"> </div>';
   
//end kod wyswietlania   

   if(is_single()) {
      if($wkomsp_beforepost) {
         $content = $wkomsp_buttonscode.$content;
      }
      if($wkomsp_afterpost) {
         $content = $content.$wkomsp_buttonscode;
      }
   }else if(is_page()) { 
      if($wkomsp_beforepage) {
         $content = $wkomsp_buttonscode.$content;
      }
      if($wkomsp_afterpage) {
         $content = $content.$wkomsp_buttonscode;
      }   
   }else{
      if($wkomsp_beforearchive) {
         $content = $wkomsp_buttonscode.$content;
      }
      if($wkomsp_afterarchive) {
         $content = $content.$wkomsp_buttonscode;
      }   
   }
      
   return $content;

   
}

function wkomsp_where_to_insert()
{

   // display on single post?
   $wkomsp_beforepost = get_option('wkomsp_beforepost'); 
   $wkomsp_afterpost = get_option('wkomsp_afterpost'); 
   if(is_single() && ($wkomsp_beforepost || $wkomsp_afterpost))
   {
      return true;  
   }

   // display on single page?
   $wkomsp_beforepage = get_option('wkomsp_beforepage'); 
   $wkomsp_afterpage = get_option('wkomsp_afterpage'); 
   if(is_page() && ($wkomsp_beforepage || $wkomsp_afterpage))
   {
      return true;  
   }
   
   // display on frontpage, categories, archives, tags?
   $wkomsp_showfront = get_option('wkomsp_showfront'); 
   $wkomsp_showcategory = get_option('wkomsp_showcategory'); 
   $wkomsp_showarchive = get_option('wkomsp_showarchive'); 
   $wkomsp_showtag = get_option('wkomsp_showtag'); 

   if(is_front_page() && $wkomsp_showfront)
   {
      return true;  
   }   

   if(is_category() && $wkomsp_showcategory)
   {
      return true;  
   }  

   if(is_date() && $wkomsp_showarchive)
   {
      return true;  
   }     

   if(is_tag() && $wkomsp_showtag)
   {
      return true;  
   }
   return false;         
}

add_filter ('the_content', 'wkomsp_insert_buttons');  
add_filter ('the_excerpt', 'wkomsp_insert_buttons');  

function wkomsp_menu()
{
   global $wpdb;
   include 'wkomsp-admin.php';
}

function wkomsp_admin_actions()
{
    add_options_page("Społecznościowa 6 PL ", "Społecznościowa 6 PL ", 1, "spolecznosciowa-6-pl", "wkomsp_menu");
}
 
add_action('admin_menu', 'wkomsp_admin_actions');



add_filter('plugin_action_links', 'wkomsp_plugin_action_links', 10, 2);
 
function wkomsp_plugin_action_links($links, $file) {
    static $this_plugin;
 
    if (!$this_plugin) {
        $this_plugin = plugin_basename(__FILE__);
    }
 
    if ($file == $this_plugin) {
        // The "page" query string value must be equal to the slug
        // of the Settings admin page we defined earlier, which in
        // this case equals "myplugin-settings".
        $settings_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=spolecznosciowa-6-pl">Ustawienia</a>';
        array_unshift($links, $settings_link);
    }
 
    return $links;
}

// install and default settings
function wkomsp_set_defaults()
{
   add_option( "wkomsp_facebook", "1", "", "yes" );
   add_option( "wkomsp_google", "1", "", "yes" );
   add_option( "wkomsp_twitter", "1", "", "yes" );
   add_option( "wkomsp_nk", "1", "", "yes" );
   add_option( "wkomsp_wykop", "1", "", "yes" );
   add_option( "wkomsp_beforepost", "1", "", "yes" );     
}
register_activation_hook( __FILE__, 'wkomsp_set_defaults' );



?>