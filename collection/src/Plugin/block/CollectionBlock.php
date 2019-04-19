<?php

/**
 * @file
 * Contains \Drupal\collection\Plugin\block\CollectionBlock.
 */

namespace Drupal\collection\Plugin\block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'administrator' block.
 *
 * @Block(
 *   id = "administrator_block",
 *   admin_label = @Translation("Administrator block"),
 *   category = @Translation("This block will be visible only on admin pages, and to administrators only.")
 * )
 */
class CollectionBlock extends BlockBase {

  /**
   * @return array
   */
  public function build() {
    return array(
      '#type' => 'markup',
      '#markup' => t('This block is visible only on admin pages, and to administrators only.'),
    );
  }

}
