<?php

namespace Drupal\collection\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * An example controller.
 */
class CollectionController extends ControllerBase {

  /**
   * Returns a render-able array for a custom page.
   */
  public function content() {
    $build = [
      '#markup' => $this->t('New route subscriber created to change the controller serving the route.'),
    ];
    return $build;
  }

}
