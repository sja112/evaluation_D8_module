<?php

namespace Drupal\collection\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Listens to the dynamic route events.
 */
class RouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    // Change path '/ctrlRoute' to '/alteredRoute'.
    if ($route = $collection->get('collection.ctrlRoute')) {
      $route->setPath('/alteredRoute');
    }
  }

}
