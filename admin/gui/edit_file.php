<form method="post" action="<?php echo SITE_URL .'/wp-admin/options-general.php?page=one-stop-seo&button=submit' ?>">
    <?php settings_fields( 'one_stop_seo_options_group' ); ?>
    <h3>Robots.txt</h3>
    <table>
      <tr valign="top">
        <th scope="row">
          <label for="one_stop_seo_option_name">Robots.txt</label>
        </th>
        <td>
          <textarea 
          id="robots" 
          name="robots"
          cols="70"
          rows="8" ><?php echo $abc = html_entity_decode(check_value('data_option','custom_head','option_value','main_table')); ?></textarea>
        </td>
      </tr>
    </table>
    <?php  submit_button(); ?>
  </form>

 

  <!-- <form method="post" action="<?php echo SITE_URL .'/wp-admin/options-general.php?page=one-stop-seo&button=submit' ?>">
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
          rows="8" ><?php echo $abc = check_value('data_option','custom_body','option_value','main_table'); ?></textarea>
        </td>
      </tr>
    </table>
    <?php  submit_button(); ?>
  </form> 
  <script>
function run() {
  const url = setUpQuery();
  fetch(url)
    .then(response => response.json())
    .then(json => {
      // See https://developers.google.com/speed/docs/insights/v5/reference/pagespeedapi/runpagespeed#response
      // to learn more about each of the properties in the response object.
      showInitialContent(json.id);
      const cruxMetrics = {
        "First Contentful Paint": json.loadingExperience.metrics.FIRST_CONTENTFUL_PAINT_MS.category,
        "First Input Delay": json.loadingExperience.metrics.FIRST_INPUT_DELAY_MS.category
      };
      showCruxContent(cruxMetrics);
      const lighthouse = json.lighthouseResult;
      const lighthouseMetrics = {
        'First Contentful Paint': lighthouse.audits['first-contentful-paint'].displayValue,
        'Speed Index': lighthouse.audits['speed-index'].displayValue,
        'Time To Interactive': lighthouse.audits['interactive'].displayValue,
        'First Meaningful Paint': lighthouse.audits['first-meaningful-paint'].displayValue,
        'First CPU Idle': lighthouse.audits['first-cpu-idle'].displayValue,
        'Estimated Input Latency': lighthouse.audits['estimated-input-latency'].displayValue
      };
      showLighthouseContent(lighthouseMetrics);
    });
}

function setUpQuery() {
  const api = 'https://www.googleapis.com/pagespeedonline/v5/runPagespeed';
  const parameters = {
    url: encodeURIComponent('https://developers.google.com')
  };
  let query = `${api}?`;
  for (key in parameters) {
    query += `${key}=${parameters[key]}`;
  }
  return query;
}

function showInitialContent(id) {
  document.body.innerHTML = '';
  const title = document.createElement('h1');
  title.textContent = 'PageSpeed Insights API Demo';
  document.body.appendChild(title);
  const page = document.createElement('p');
  page.textContent = `Page tested: ${id}`;
  document.body.appendChild(page);
}

function showCruxContent(cruxMetrics) {
  const cruxHeader = document.createElement('h2');
  cruxHeader.textContent = "Chrome User Experience Report Results";
  document.body.appendChild(cruxHeader);
  for (key in cruxMetrics) {
    const p = document.createElement('p');
    p.textContent = `${key}: ${cruxMetrics[key]}`;
    document.body.appendChild(p);
  }
}

function showLighthouseContent(lighthouseMetrics) {
  const lighthouseHeader = document.createElement('h2');
  lighthouseHeader.textContent = "Lighthouse Results";
  document.body.appendChild(lighthouseHeader);
  for (key in lighthouseMetrics) {
    const p = document.createElement('p');
    p.textContent = `${key}: ${lighthouseMetrics[key]}`;
    document.body.appendChild(p);
  }
}

run();
</script>
-->