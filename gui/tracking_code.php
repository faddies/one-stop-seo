<div>
  <?php screen_icon(); ?>
  <h2>One Stop SEO Options</h2>
  <form method="post" action="/plugintest/wp-admin/options-general.php?page=one-stop-seo&button=submit">
    <?php settings_fields( 'one_stop_seo_options_group' ); ?>
    <h3>Add Google Tag Manager Code</h3>
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
          value="<?php echo $abc = check_value('option','gtm_code','option_value','main_table'); ?>" />

        </td>
        <td>Enter Code only: 
          <span style="color:white; font-weight: bold;">GTM-xxxxxxx</span>
        </td>
      </tr>
    </table>
    <?php  submit_button(); ?>
  </form>
  <form method="post" action="/plugintest/wp-admin/options-general.php?page=one-stop-seo&button=submit">
    <?php settings_fields( 'one_stop_seo_options_group' ); ?>
    <h3>Add Google Analytics Code</h3>
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
          value="<?php echo $abc = check_value('option','ga_code','option_value','main_table'); ?>" />
        </td>
        <td>Enter Code only: 
          <span style="color:white; font-weight: bold;">UA-xxxxxxxxx-x</span>
        </td>
      </tr>
    </table>
    <?php  submit_button(); ?>
  </form>
  <form method="post" action="/plugintest/wp-admin/options-general.php?page=one-stop-seo&button=submit">
    <?php settings_fields( 'one_stop_seo_options_group' ); ?>
    <h3>Add Google Search Console Code</h3>
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
          value="<?php echo $abc = check_value('option','sc_code','option_value','main_table');  ?>" />
        </td>
        <td>Code Only. XXXXXXX_XXXXX_XXXXXX 
        </td>
      </tr>
    </table>
    <?php  submit_button(); ?>
  </form>
</div>