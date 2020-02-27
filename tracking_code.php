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
          <span style="color:red; font-weight: bold;">GTM-xxxxxxx</span>
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
          <span style="color:red; font-weight: bold;">UA-xxxxxxxxx-x</span>
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
          maxlength="43" 
          value="<?php echo $abc = check_value('option','sc_code','option_value','main_table');  ?>" />
        </td>
        <td>Enter Code highlighted in Red &lt;meta name="google-site-verification" content="
          <span style="color:red; font-weight: bold;">Bi6c2liN2EH7_Ctm5fQ71kuro6Im_D3pSih9EbAgoFk</span>" /&gt; 
        </td>
      </tr>
    </table>
    <?php  submit_button(); ?>
  </form>
</div>