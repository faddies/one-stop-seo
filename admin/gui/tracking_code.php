<div>
  <?php screen_icon(); ?>
  <!-- <h2>One Stop SEO Options</h2> -->
  <form class="tracking_page" method="post" action="<?php echo SITE_URL .'/wp-admin/options-general.php?page=one-stop-seo&button=submit' ?>">
    <?php settings_fields( 'one_stop_seo_options_group' ); ?>
    <!-- <h3>Google Tag Manager Code</h3> -->
    <img style="width: 8%;" src="<?php echo PLUGIN_URL.'/one-stop-seo/admin/assets/images/gtm.png'; ?>">
    <table>
      <tr valign="top">
        <th scope="row">
          <label for="one_stop_seo_option_name">Google Tag Manager</label>
        </th>
        <td>
          <input 
          type="text" 
          id="gtmcode" 
          name="gtmcode" 
          pattern="|[Gg][Tt][Mm]-[0-9][0-9][0-9][0-9][0-9][0-9][0-9]"
          value="<?php echo $abc = check_value('data_option','gtm_code','option_value','main_table'); ?>" />

        </td>
        <td>Enter Code only: 
          <span style="color:white; font-weight: bold;">GTM-xxxxxxx</span>
        </td>
      </tr>
    </table>
    <?php  submit_button(); ?>
  </form>
  <form class="tracking_page" method="post" action="<?php echo SITE_URL .'/wp-admin/options-general.php?page=one-stop-seo&button=submit' ?>">
    <?php settings_fields( 'one_stop_seo_options_group' ); ?>
    <!-- <h3>Google Analytics Code</h3> -->
    <img style="width: 8%;" src="<?php echo PLUGIN_URL.'/one-stop-seo/admin/assets/images/analytics.png'; ?>">
    <table>
      <tr valign="top">
        <th scope="row">
          <label for="one_stop_seo_option_name">Google Analytics</label>
        </th>
        <td>
          <input 
          type="text" 
          id="gacode" 
          name="gacode"
          pattern="[Uu][Aa]-[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]-[0-9]"
          value="<?php echo $abc = check_value('data_option','ga_code','option_value','main_table'); ?>" />
        </td>
        <td>Enter Code only: 
          <span style="color:white; font-weight: bold;">UA-xxxxxxxxx-x</span>
        </td>
      </tr>
    </table>
    <?php  submit_button(); ?>
  </form>
  <form class="tracking_page" method="post" action="<?php echo SITE_URL .'/wp-admin/options-general.php?page=one-stop-seo&button=submit' ?>">
    <?php settings_fields( 'one_stop_seo_options_group' ); ?>
    <!-- <h3>Google Search Console Code</h3> -->
    <img style="width: 8%;" src="<?php echo PLUGIN_URL.'/one-stop-seo/admin/assets/images/gsc.png'; ?>">
    <table>
      <tr valign="top">
        <th scope="row">
          <label for="one_stop_seo_option_name">Google Search Console</label>
        </th>
        <td>
          <input 
          onclick="if (this.defaultValue==this.value) this.value=''" 
          onblur="if (this.value=='') this.value=this.defaultValue" 
          type="text" 
          id="sccode" 
          name="sccode"
          pattern="[A-Za-z-_0-9]{43}"
          maxlength="43" 
          value="<?php echo $abc = check_value('data_option','sc_code','option_value','main_table');  ?>" />
        </td>
        <td>Code Only: XXXXXXX_XXXXX_XXXXXX 
        </td>
      </tr>
    </table>
    <?php  submit_button(); ?>
  </form>
  <form class="tracking_page" method="post" action="<?php echo SITE_URL .'/wp-admin/options-general.php?page=one-stop-seo&button=submit' ?>">
    <?php settings_fields( 'one_stop_seo_options_group' ); ?>
    <!-- <h3>Google Search Console Code</h3> -->
    <img style="width: 8%;" src="<?php echo PLUGIN_URL.'/one-stop-seo/admin/assets/images/google-ads.png'; ?>">
    <table>
      <tr valign="top">
        <th scope="row">
          <label for="one_stop_seo_option_name">Google Conversion Tracking</label>
        </th>
        <td>
          <input 
          type="text" 
          id="ctcode" 
          name="ctcode"
          pattern="[Aa][Ww]-[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]"
          value="<?php echo $abc = check_value('data_option','ct_code','option_value','main_table');  ?>" />
        </td>
        <td>Code Only. AW-XXXXXXXXX
        </td>
      </tr>
    </table>
    <?php  submit_button(); ?>
  </form>
</div>