<?php
function registerewpPage() {
	add_submenu_page( 'edit.php?post_type=portfolio', 'eWP Portfolio Settings', 'Portfolio Settings', 'manage_options', 'portfolio', 'ewpPageFunction' ); 
}
add_action('admin_menu', 'registerewpPage');

function ewpPageFunction() {
	
	echo '<div class="newsWrap">';
		echo '<h1>WP Creative Portfolio Configurations</h1>';
?>

<div id="nhtLeft">
  <form method="post" action="options.php">
    <?php wp_nonce_field('update-options'); ?>
    <div class="inside">
      <h3>Insert your text & background color</h3>
      <hr />
      <p>WP Creative Portfolio is a fully responsive wordpress portfolio slider plugin. <br />
        Just copy and paste "<strong>if(function_exists('e_portfolio_content_exist')){e_portfolio_content();}</strong> in the template code or <strong>[CREATIVE-PORTFOLIO]</strong> in the post/page" where you want to display portfolio.</p>
      <table class="form-table">
        <tr>
          <th><label for="ewp_bg_color">Background Color</label></th>
          <td><input type="text" name="ewp_bg_color" id="ewp_bg_color" value="<?php $ewp_bg_color = get_option('ewp_bg_color'); if(!empty($ewp_bg_color)) {echo $ewp_bg_color;} else {echo "#3397db";}?>" class="color-picker ewp_bg_color" /></td>
        </tr>
        <tr>
          <th><label for="ewp_title_color">Title Font Color </label></th>
          <td><input type="text" name="ewp_title_color" id="ewp_title_color" value="<?php $ewp_title_color = get_option('ewp_title_color'); if(!empty($ewp_title_color)) {echo $ewp_title_color;} else {echo "#fff";}?>" class="color-picker ewp_title_color" /></td>
        </tr>
        <tr>
          <th><label for="ewp_content_color">Content Font Color</label></th>
          <td><input type="text" name="ewp_content_color" id="ewp_content_color" value="<?php $ewp_content_color = get_option('ewp_content_color'); if(!empty($ewp_content_color)) {echo $ewp_content_color;} else {echo "#000";}?>" class="color-picker ewp_content_color" /></td>
        </tr>
        <tr>
          <th><label for="ewp_number_word">Display Excerpt Word</label></th>
          <td><input type="text" name="ewp_number_word" id="ewp_number_word" value="<?php $ewp_number_word = get_option('ewp_number_word'); if(!empty($ewp_number_word)) {echo $ewp_number_word;} else {echo "10";}?>" class="ewp_number_word" /></td>
        </tr>
        <tr>
          <th><label for="ewp_content_word">Display Content Word</label></th>
          <td><input type="text" name="ewp_content_word" id="ewp_content_word" value="<?php $ewp_content_word = get_option('ewp_content_word'); if(!empty($ewp_content_word)) {echo $ewp_content_word;} else {echo "100";}?>" class="ewp_content_word" /></td>
        </tr>
      </table>
      <input type="hidden" name="action" value="update" />
      <input type="hidden" name="page_options" value="ewp_bg_color, ewp_title_color, ewp_content_color, ewp_number_word, ewp_content_word" />
      <p class="submit">
        <input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" class="button button-primary" />
      </p>
    </div>
  </form>
</div>
<div id="nhtRight">
  <div class="nhtWidget">
    <h3>Donate and support the development.</h3>
    <hr />
    <p>With your help I can make Simple Fields even better! $5, $10, $100 – any amount is fine! :)</p>
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
      <input type="hidden" name="cmd" value="_s-xclick">
      <input type="hidden" name="hosted_button_id" value="82C6LTLMFLUFW">
      <input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
      <img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
    </form>
  </div>
  <div class="nhtWidget">
    <div class="clrFix"></div>
    <h3>About the Author</h3>
    <hr />
    <div class="hiremewidget">
      <p>My name is <strong><a href="https://www.upwork.com/freelancers/~01bf79370d989b2033" target="_blank">S M Hasibul Islam</a></strong> and I am a <strong>Web Developer, Expert WordPress Developer</strong>. I am regularly available for interesting freelance projects. If you ever need my help, do not hesitate to get in touch <a href="https://www.upwork.com/freelancers/~01bf79370d989b2033" target="_blank">me</a>. Don't hesitate to <a href="http://www.e2soft.com/forum/" target="_blank">ask any question on our forum</a>.<br />
        <strong>Skype:</strong> cse.hasib<br />
        <strong>Email:</strong> cse.hasib@gmail.com<br />
        <strong>Web:</strong> <a href="http://www.e2soft.com/"/>www.e2soft.com</a><br />
      </p>
      <div class="clrFix"></div>
    </div>
    <div class="clrFix"></div>
  </div>
  
</div>
<div class="clrFix"></div>
</div>
<div class="clrFix"></div>
<?php		
	echo '</div>';
}
