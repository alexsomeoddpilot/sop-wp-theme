<?php
/**
 * Wordpress functions
 */

namespace someoddpilot\wptheme;

use Timber;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$theme = new Theme(
  new Timber(),
  new Request(),
  new Response()
);

$theme->addController('someoddpilot\\wptheme\\controllers\\SiteController');

if (!isset($content_width)) {
  $content_width = 900;
}

