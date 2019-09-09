<?php
/**
 * @file
 * The primary PHP file for this theme.
 */

function ms_bs_preprocess_page(&$vars) {
    // template files called page--contenttype.tpl.php
    if (isset($vars['node']->type)) {
        $vars['theme_hook_suggestions'][] = 'page__' . $vars['node']->type;
    //Template files based on page titles(if works move to parent theme)
        $vars['theme_hook_suggestions'][] = 'page__' . $vars['node']->title;
   }

	drupal_add_js(drupal_get_path('theme', 'aesbs337').'/js/logoscroll.js');
	drupal_add_js(drupal_get_path('theme', 'aesbs337').'/js/fade-text.js');
  drupal_add_js(drupal_get_path('theme', 'ms_bs').'/js/animatedcollapse.js');
}

function ms_bs_theme(){
	$items=array();

	$items['user_login']=array(
	'render element' => 'form',
	'path'=> drupal_get_path('theme', 'ms_bs').'/templates',
	'template'=>'user_login',
	'preprocess functions'=>array(
	'ms_bs_preprocess_user_login'
	),
	);
	return $items;
}

function ms_bs_preprocess_maintenance_page(&$variables) {
  if (isset($variables['db_is_active']) && !$variables['db_is_active']) {
// Template suggestion for offline site
    $variables['theme_hook_suggestion'] = 'maintenance_page__offline';
  }
else {
// Template suggestion for live site (in maintenance mode)
    $variables['theme_hook_suggestion'] = 'maintenance_page';
 }
}
