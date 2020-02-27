<form method="post" action="/plugintest/wp-admin/options-general.php?page=one-stop-seo&button=submit">
    <?php settings_fields( 'one_stop_seo_options_group' ); ?>
    <h3>Add Custom Code in &lt;head&gt; #code# &lt;/head&gt;</h3>
    <table>
      <tr valign="top">
        <th scope="row">
          <label for="one_stop_seo_option_name">Custom Code</label>
        </th>
        <td>
          <textarea 
          id="customforhead" 
          name="customforhead"
          cols="70"
          rows="8" ><?php echo $abc = html_entity_decode(check_value('option','custom_head','option_value','main_table')); ?></textarea>
        </td>
      </tr>
    </table>
    <?php  submit_button(); ?>
  </form>
  <form method="post" action="/plugintest/wp-admin/options-general.php?page=one-stop-seo&button=submit">
    <?php settings_fields( 'one_stop_seo_options_group' ); ?>
    <h3>Add Custom Code in &lt;body&gt; #code# &lt;/body&gt;</h3>
    <table>
      <tr valign="top">
        <th scope="row">
          <label for="one_stop_seo_option_name">Custom Code</label>
        </th>
        <td>
          <textarea 
          id="customforbody" 
          name="customforbody"
          cols="70"
          rows="8" ><?php echo $abc = check_value('option','custom_body','option_value','main_table'); ?></textarea>
        </td>
      </tr>
    </table>
    <?php  submit_button(); ?>
  </form>