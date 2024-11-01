<?php
if( !defined( 'ABSPATH') && !defined('WP_UNINSTALL_PLUGIN') ) {
   exit();
}
/*  
Wtyczka wykorzystuje kod pluginu Simple Social Buttons v.1.0 autora Pawe³a Rabinek http://blog.rabinek.pl/simple-social-buttons/
*/
// clean up the databes before the uninstall plugin

delete_option('wkomsp_facebook');
delete_option('wkomsp_google');
delete_option('wkomsp_twitter');
delete_option('wkomsp_nk');

delete_option('wkomsp_wykop');
delete_option('wkomsp_opis');
delete_option('wkomsp_opistext');


delete_option('wkomsp_beforepost');
delete_option('wkomsp_afterpost');

delete_option('wkomsp_showfront');
delete_option('wkomsp_showcategory');
delete_option('wkomsp_showarchive');
delete_option('wkomsp_showtag');

delete_option('wkomsp_beforearchive');
delete_option('wkomsp_afterarchive');

?>