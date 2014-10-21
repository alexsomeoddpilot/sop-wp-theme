<?php

namespace someoddpilot\wptheme;

use Timber;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Theme
{
  public function __construct(Timber $timber, Request $request, Response $response)
  {
    $this->timber = $timber;
    $this->request = $request;
    $this->response = $response;

    add_theme_support('post-thumbnails');
    add_theme_support('custom-header');
    add_theme_support('custom-background');

    $this->addFilter('timber_context', array($this, 'addToContext'));
  }

  public function addController($controllerClass)
  {
    new $controllerClass($this->timber, $this->request, $this->response);
  }

  public function addFilter($filterName, $callback)
  {
    add_filter($filterName, $callback);
  }

  /**
   * @return array context
   */
  public function addToContext(array $context)
  {
    $context['pageTitle'] = wp_title('|', false, 'right');

    return $context;
  }
}
