<?php

namespace Drupal\collection\Breadcrumb;

use Drupal\Core\Breadcrumb\Breadcrumb;
use Drupal\Core\Breadcrumb\BreadcrumbBuilderInterface;
use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Core\Link;
use Drupal\Core\Url;

class CollectionBreadcrumbBuilder implements BreadcrumbBuilderInterface {

  /**
   * {@inheritdoc}
   */
  public function applies(RouteMatchInterface $attributes) {
    $parameters = $attributes->getParameters()->all();
    if (!empty($parameters['node'])) {
      return $parameters['node']->getType() == 'article';
    }
  }

  /**
   * {@inheritdoc}
   */
  public function build(RouteMatchInterface $route_match) {
    $node = $route_match->getParameter('node');
    $breadcrumb = new Breadcrumb();

    // Breadcrumbs for nodes have no cache tags.
    $breadcrumb->addCacheableDependency($node);

    // By setting a "cache context" to the "url", each requested URL gets it's own cache.
    // This way a single breadcrumb isn't cached for all pages on the site.
    $breadcrumb->addCacheContexts(["url"]);

    // By adding "cache tags" for this specific node, the cache is invalidated when the node is edited.
    $breadcrumb->addCacheTags(["node:{$node->id()}"]);

    $host = \Drupal::request()->getSchemeAndHttpHost();
    $current_path = \Drupal::service('path.current')->getPath();
    $current_uri = \Drupal::service('path.alias_manager')->getAliasByPath($current_path);

    $url_pieces = explode('/', $current_uri);
    $cumulative_path = $host;
    $cumulative_pieces = '';
    $breadcrumb->addLink(Link::createFromRoute(t('Home'), '<front>'));

    foreach ($url_pieces as $key => $url_piece) {
      if (trim($url_piece) != '') {
        $cumulative_pieces .= '/' . $url_piece;
        $path = \Drupal::service('path.alias_manager')->getPathByAlias($cumulative_pieces);

        if (preg_match('/node\/(\d+)/', $path, $matches)) {
          $node = \Drupal\node\Entity\Node::load($matches[1]);
          $cumulative_path .= '/' . $url_piece;
          $turl = Url::fromUri($cumulative_path);
          $link = Link::fromTextAndUrl($node->getTitle(), $turl);
          // Add breadcrumb link.
          $breadcrumb->addLink($link);
        }
      }
    }
    return $breadcrumb;
  }

}
