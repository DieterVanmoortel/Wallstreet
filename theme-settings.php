<?php

/**
* Implements theme_settings().
*
* @param $saved_settings
*   array An array of saved settings for this theme.
* @return
*   array A form array.
*/
function wallstreet_form_system_theme_settings_alter(&$form, &$form_state) {
  
  // Ensure this include file is loaded when the form is rebuilt from the cache.
  $form_state['build_info']['files']['form'] = drupal_get_path('theme', 'wallstreet') . '/theme-settings.php';
  
  $form['wallstreet_settings_title'] = array(
    '#markup' => t('wallstreet Settings'),
  );
  
  $form['wallstreet_theme_settings'] = array(
    '#type' => 'vertical_tabs',
    '#title' => t('wallstreet Theme Settings'),
  );
  
  $form['wallstreet_logo_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Logo'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    '#group' => 'wallstreet_theme_settings',
  );
  
  $form['wallstreet_logo_settings']['wallstreet_enable_logo'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable logo'),
    '#default_value' => (theme_get_setting('wallstreet_enable_logo')) ? theme_get_setting('wallstreet_enable_logo') : 0,
  );
  
  $form['wallstreet_logo_settings']['wallstreet_logo_position'] = array(
    '#type' => 'radios',
    '#title' => t('Position of logo'),
    '#options' => array(
      'left' => t('Left'),
      'right' => t('Right'),
    ),
    '#states' => array(
      'visible' => array(
        ':input[name="wallstreet_enable_logo"]' => array('checked' => TRUE),
      ),
    ),
    '#default_value' => (theme_get_setting('wallstreet_logo_position')) ? theme_get_setting('wallstreet_logo_position') : 'left',
  );
  
  $form['wallstreet_sidebar_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Sidebar Visibility'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    '#group' => 'wallstreet_theme_settings',
  );
  
  $form['wallstreet_sidebar_settings']['wallstreet_sidebar_visibility'] = array(
    '#type' => 'textarea',
    '#title' => t('Sidebar visibilty (Do not show the sidebar on the following pages)'),
    '#description' => t('Enter the path for pages you do not want to show the sidebar. Enter one path per line. The \'*\' character is a wildcard. Example paths are blog for the blog page and blog/* for every personal blog. &lt;front&gt; is the front page. '),
    '#attributes' => array(
      'cols' => '25',
    ),
    '#default_value' => theme_get_setting('wallstreet_sidebar_visibility'),
  );
  
  $form['wallstreet_theme_options'] = array(
    '#type' => 'fieldset',
    '#title' => t('Other'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    '#group' => 'wallstreet_theme_settings',
  );
  
  $form['wallstreet_theme_options']['wallstreet_show_front_page_title'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show page title on front page'),
    '#default_value' => theme_get_setting('wallstreet_show_front_page_title'),
  );
  
  if (module_exists('follow')) {
    $form['wallstreet_theme_options']['wallstreet_show_follow_links'] = array(
      '#type' => 'checkbox',
      '#title' => t('Show follow links in search block'),
      '#default_value' => theme_get_setting('wallstreet_show_follow_links'),
    );
  }

  // Return the additional form widgets
  return $form;
}
  