<?php
/*  
Wtyczka wykorzystuje kod pluginu Simple Social Buttons v.1.0 autora Paweła Rabinek http://blog.rabinek.pl/simple-social-buttons/
*/
?>
<div class="wrap">

<style type="text/css">
#ikony img { 
    border:none;
	margin:0;
	padding:0;
	border-radius: 3px;box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);
	margin-left:6px;
	}
#ikony input {
	margin-top:-5px;
}
</style>

<h2>Społecznościowa 6 PL 2013 - Ustawienia</h2>

<p>Najszybsza i najmniej obciążająca wtyczka społecznościowa zawierająca serwisy: Facebook, Twitter, Google+, Wykop i Naszą Klasę. - <strong>v.2.0 wydana 06 stycznia 2014r.</strong></p>

<?php 

define( 'wkom_folder' , WP_PLUGIN_URL . '/' . str_replace(basename( __FILE__) , "" , plugin_basename(__FILE__) ) ); //folder spolecznosciowa


if($_POST['hiddenconfirm'] == 'Y') { 

   // save settings
   // serwisy
   
   $wkomsp_facebook = $_POST['wkomsp_facebook'];
   update_option('wkomsp_facebook', $wkomsp_facebook);  
    
   $wkomsp_google = $_POST['wkomsp_google'];
   update_option('wkomsp_google', $wkomsp_google);
   
   $wkomsp_twitter = $_POST['wkomsp_twitter'];
   update_option('wkomsp_twitter', $wkomsp_twitter);

   $wkomsp_nk = $_POST['wkomsp_nk'];
   update_option('wkomsp_nk', $wkomsp_nk);  
    
   $wkomsp_wykop = $_POST['wkomsp_wykop'];
   update_option('wkomsp_wykop', $wkomsp_wykop);
   
   $wkomsp_opis = $_POST['wkomsp_opis'];
   update_option('wkomsp_opis', $wkomsp_opis);
   
   $wkomsp_opistext = $_POST['wkomsp_opistext'];
   update_option('wkomsp_opistext', $wkomsp_opistext);

   //opcje

   $wkomsp_beforepost = $_POST['wkomsp_beforepost'];
   update_option('wkomsp_beforepost', $wkomsp_beforepost);

   $wkomsp_afterpost = $_POST['wkomsp_afterpost'];
   update_option('wkomsp_afterpost', $wkomsp_afterpost);

   $wkomsp_beforepage = $_POST['wkomsp_beforepage'];
   update_option('wkomsp_beforepage', $wkomsp_beforepage);

   $wkomsp_afterpage = $_POST['wkomsp_afterpage'];
   update_option('wkomsp_afterpage', $wkomsp_afterpage);
   
   $wkomsp_showfront = $_POST['wkomsp_showfront'];
   update_option('wkomsp_showfront', $wkomsp_showfront);
   
   $wkomsp_showcategory = $_POST['wkomsp_showcategory'];
   update_option('wkomsp_showcategory', $wkomsp_showcategory);
   
   $wkomsp_showarchive = $_POST['wkomsp_showarchive'];
   update_option('wkomsp_showarchive', $wkomsp_showarchive);
   
   $wkomsp_showtag = $_POST['wkomsp_showtag'];
   update_option('wkomsp_showtag', $wkomsp_showtag);

   $wkomsp_beforearchive = $_POST['wkomsp_beforearchive'];
   update_option('wkomsp_beforearchive', $wkomsp_beforearchive);

   $wkomsp_afterarchive = $_POST['wkomsp_afterarchive'];
   update_option('wkomsp_afterarchive', $wkomsp_afterarchive);
      
}else{ 
   
   // get settings from database
   // pobranie ikon i opisu
   
   $wkomsp_facebook = get_option('wkomsp_facebook'); 
   $wkomsp_google = get_option('wkomsp_google'); 
   $wkomsp_twitter = get_option('wkomsp_twitter'); 
   $wkomsp_nk = get_option('wkomsp_nk'); 
   $wkomsp_wykop = get_option('wkomsp_wykop'); 
   $wkomsp_opis = get_option('wkomsp_opis'); 
   $wkomsp_opistext = get_option('wkomsp_opistext');  
   
   //pobranie opcji
   $wkomsp_beforepost = get_option('wkomsp_beforepost'); 
   $wkomsp_afterpost = get_option('wkomsp_afterpost'); 

   $wkomsp_beforepage = get_option('wkomsp_beforepage'); 
   $wkomsp_afterpage = get_option('wkomsp_afterpage'); 
   
   $wkomsp_showfront = get_option('wkomsp_showfront'); 
   $wkomsp_showcategory = get_option('wkomsp_showcategory'); 
   $wkomsp_showarchive = get_option('wkomsp_showarchive'); 
   $wkomsp_showtag = get_option('wkomsp_showtag'); 

   $wkomsp_beforearchive = get_option('wkomsp_beforearchive'); 
   $wkomsp_afterarchive = get_option('wkomsp_afterarchive'); 
} 

?>


<div class="postbox-container">
   <div id="poststuff">
      <form name="wkomsp_form" method="post" action="">
      
      <div class="postbox" id="ikony">
         <h3>Wybór serwisów społecznościowych</h3>
         <div class="inside">
            <h4>Wybierz przyciski do wyświetlenia</h4>
            <p><input type="checkbox" name="wkomsp_facebook" id="wkomsp_facebook" value="1" <?php if(!empty($wkomsp_facebook)) { ?>checked="checked"<?php } ?> /> <label for="wkomsp_facebook"><img src="<?php echo wkom_folder; ?>ikony/facebook24.png" /></label></p>
            <p><input type="checkbox" name="wkomsp_google" id="wkomsp_google" value="1" <?php if(!empty($wkomsp_google)) { ?>checked="checked"<?php } ?> /> <label for="wkomsp_google"><img src="<?php echo wkom_folder; ?>ikony/google24.png" /></label></p>
            <p><input type="checkbox" name="wkomsp_twitter" id="wkomsp_twitter" value="1" <?php if(!empty($wkomsp_twitter)) { ?>checked="checked"<?php } ?> /> <label for="wkomsp_twitter"><img src="<?php echo wkom_folder; ?>ikony/twitter24.png" /></label></p>
			<p><input type="checkbox" name="wkomsp_nk" id="wkomsp_nk" value="1" <?php if(!empty($wkomsp_nk)) { ?>checked="checked"<?php } ?> /> <label for="wkomsp_nk"><img src="<?php echo wkom_folder; ?>ikony/nk24.png" /></label></p>
            <p><input type="checkbox" name="wkomsp_wykop" id="wkomsp_wykop" value="1" <?php if(!empty($wkomsp_wykop)) { ?>checked="checked"<?php } ?> /> <label for="wkomsp_wykop"><img src="<?php echo wkom_folder; ?>ikony/wykop24.png" /></label></p>
			<h4>Tekst do wyświetlenia<br />nad ikonami np:</h4>
			<p><input type="checkbox" name="wkomsp_opis" id="wkomsp_opis" value="1" <?php if(!empty($wkomsp_opis)) { ?>checked="checked"<?php } ?> style="margin-top:2px;"/> <label><input type="text" name="wkomsp_opistext" value="<?php if(empty($wkomsp_opistext)) { echo 'Udostępnij na:'; } else { echo $wkomsp_opistext; }; ?>"> </label></p>
         </div>
      </div>
	</div>
</div>


	  
<div class="postbox-container" style="margin-left: 15px;">
   <div id="poststuff">	  
      <div class="postbox">
         <h3>Pojedyńcze wpisy - ustawienia</h3>
         <div class="inside">
            <h4>Miejsce przycisków na podstronie wpisu:</h4>
            <p><input type="checkbox" name="wkomsp_beforepost" id="wkomsp_beforepost" value="1" <?php if(!empty($wkomsp_beforepost)) { ?>checked="checked"<?php } ?> /> <label for="wkomsp_beforepost">Nad treścią wpisu</label></p>
            <p><input type="checkbox" name="wkomsp_afterpost" id="wkomsp_afterpost" value="1" <?php if(!empty($wkomsp_afterpost)) { ?>checked="checked"<?php } ?> /> <label for="wkomsp_afterpost">Pod treścią wpisu</label></p>
         </div>
      </div>

      <div class="postbox">
         <h3>Pojedyńcze strony - ustawienia</h3>
         <div class="inside">
            <h4>Miejsce przycisków na stronach:</h4>
            <p><input type="checkbox" name="wkomsp_beforepage" id="wkomsp_beforepage" value="1" <?php if(!empty($wkomsp_beforepage)) { ?>checked="checked"<?php } ?> /> <label for="wkomsp_beforepage">Nad treścią strony</label></p>
            <p><input type="checkbox" name="wkomsp_afterpage" id="wkomsp_afterpage" value="1" <?php if(!empty($wkomsp_afterpage)) { ?>checked="checked"<?php } ?> /> <label for="wkomsp_afterpage">Pod treścią strony</label></p>
         </div>
      </div>
            
      <div class="postbox">
         <h3>Archiwa - ustawienia</h3>
         <div class="inside">
            <h4>Dodatkowe miejsca do wyświetlenia przycisków:</h4>
            <p><input type="checkbox" name="wkomsp_showfront" id="wkomsp_showfront" value="1" <?php if(!empty($wkomsp_showfront)) { ?>checked="checked"<?php } ?> /> <label for="wkomsp_showfront">Pokazuj na stronie głównej</label></p>
            <p><input type="checkbox" name="wkomsp_showcategory" id="wkomsp_showcategory" value="1" <?php if(!empty($wkomsp_showcategory)) { ?>checked="checked"<?php } ?> /> <label for="wkomsp_showcategory">Pokazuj na stroniach kategorii</label></p>
            <p><input type="checkbox" name="wkomsp_showarchive" id="wkomsp_showarchive" value="1" <?php if(!empty($wkomsp_showarchive)) { ?>checked="checked"<?php } ?> /> <label for="wkomsp_showarchive">Pokazuje w archiwum dat</label></p>   
            <p><input type="checkbox" name="wkomsp_showtag" id="wkomsp_showtag" value="1" <?php if(!empty($wkomsp_showtag)) { ?>checked="checked"<?php } ?> /> <label for="wkomsp_showtag">Pokazuj na stronach tagów</label></p>      
            
            <h4>Miejsce przycisków na stronach archiwum:</h4>
            <p><input type="checkbox" name="wkomsp_beforearchive" id="wkomsp_beforearchive" value="1" <?php if(!empty($wkomsp_beforearchive)) { ?>checked="checked"<?php } ?> /> <label for="wkomsp_beforearchive">Nad treścią wpisu</label></p>
            <p><input type="checkbox" name="wkomsp_afterarchive" id="wkomsp_afterarchive" value="1" <?php if(!empty($wkomsp_afterarchive)) { ?>checked="checked"<?php } ?> /> <label for="wkomsp_afterarchive">Pod treścią wpisu</label></p>
         </div>
      </div>
      
      <div class="submit">
         <input type="hidden" name="hiddenconfirm" value="Y" />
         <input type="submit" name="Submit" class="button-primary" value="Zapisz ustawienia" />
      </div>  

   </form>
</div>
</div>
<div class="postbox-container"  style="margin-left: 15px;">
   <div id="poststuff">
        <div class="postbox">
		<div class="inside">
		<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2FElblagOgloszeniaPL&amp;width=240&amp;height=290&amp;show_faces=true&amp;colorscheme=light&amp;stream=false&amp;border_color&amp;header=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:240px; height:290px;" allowTransparency="true"></iframe>
		</div></div></div></div>

</div>