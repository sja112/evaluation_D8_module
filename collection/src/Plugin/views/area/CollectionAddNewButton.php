<?php

namespace Drupal\collection\Plugin\views\area;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\views\Plugin\views\area\AreaPluginBase;

/**
 * Views area collection add new button handler.
 *
 * @ingroup views_area_handlers
 *
 * @ViewsArea("collection_add_new_button")
 */
class CollectionAddNewButton extends AreaPluginBase {

  /**
   * {@inheritdoc}
   */
  protected function defineOptions() {
    $options = parent::defineOptions();
    // Set the default to TRUE so it shows on empty pages by default.
    $options['empty']['default'] = TRUE;
    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function render($empty = FALSE) {
    if (!$empty || !empty($this->options['empty'])) {
      $items = array();
      $text = $this->t('+ Add new');
      $url = Url::fromRoute('node.add_page', array());
      $items[] = array(
        '#type' => 'link',
        '#title' => $text,
        '#url' => $url,
      );
      $item_list = array(
        '#theme' => 'item_list',
        '#items' => $items,
      );
      return array(
        '#markup' => drupal_render($item_list),
      );
    }
  }

}
