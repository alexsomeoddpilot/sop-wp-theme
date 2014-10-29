<?php
/**
 * Class for theme construct
 */

namespace someoddpilot\wptheme;

use Timber;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Theme construct
 */
class Theme
{
  /**
   * Timber instanc
   *
   * @type Timber
   */
  private $timber;

  /**
   * Request instance
   *
   * @type Request
   */
  private $request;

  /**
   * Response instanc
   *
   * @type Response
   */
  private $response;

  /**
   * Construct instance of controller
   *
   * @param $timber Timber
   * @param $request Request
   * @param $response Response
   */
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

  /**
   * Add controller
   *
   * @param $controllerClass string
   * @return Controller
   */
  public function addController($controllerClass)
  {
    return new $controllerClass($this->timber, $this->request, $this->response);
  }

  /**
   * Add Wordpress filter
   *
   * @param $filterName string
   * @param $callback Callable
   */
  public function addFilter($filterName, $callback)
  {
    add_filter($filterName, $callback);
  }

  /**
   * Add to context
   *
   * @param $context array
   *
   * @return array context
   */
  public function addToContext(array $context)
  {
    $context['pageTitle'] = wp_title('|', false, 'right');

    return $context;
  }
}
