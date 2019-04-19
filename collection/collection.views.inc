<?php

/**
 * @file
 * Provide views data.
 */

/**
 * Implements hook_views_data().
 */
function collection_views_data() {
  $data['views']['table']['group'] = t('Global');
  $data['views']['table']['join'] = array(
    // #global is a special flag which allows a table to appear all the time.
    '#global' => array(),
  );
  $data['views']['collection_add_new_button'] = array(
    'title' => t('Add New Content Button'),
    'help' => t('Provides add new content button.'),
    'area' => array(
      'id' => 'collection_add_new_button',
    ),
  );
  return $data;
}
