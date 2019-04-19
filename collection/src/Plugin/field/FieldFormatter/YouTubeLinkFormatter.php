<?php

/**
 * @file
 * Contains \Drupal\collection\Plugin\field\FieldFormatter\YouTubeLinkFormatter.
 */

namespace Drupal\collection\Plugin\field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'youtube_link' formatter.
 *
 * @FieldFormatter(
 *   id = "youtube_link",
 *   label = @Translation("YouTube Formatter"),
 *   field_types = {
 *     "link"
 *   }
 * )
 */
class YouTubeLinkFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = array();

    foreach ($items as $delta => $item) {
      $url = $item->get('uri')->getValue();
      if (!empty($url)) {
        // Check whether youtube embed code is added.
        if (strpos($url, 'embed') !== false) {
          $embed_url = $url;
        }
        else {
          // Youtube embed code crated when youtube watch url is added.
          $query_string = parse_url($url, PHP_URL_QUERY);
          $query_string_array = explode('=', $query_string);
          $embed_code = $query_string_array[1];
          if (!empty($embed_code)) {
            $embed_url = 'http://www.youtube.com/embed/' . $embed_code;
          }
        }
        $elements[$delta] = array(
          '#theme' => 'youtube_link_formatter',
          '#url' => $embed_url,
        );
      }
    }
    return $elements;
  }

}
