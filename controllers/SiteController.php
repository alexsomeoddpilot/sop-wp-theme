<?php
/**
 * Controller for general site pages
 */

namespace someoddpilot\wptheme\controllers;

use someoddpilot\wpbase\controllers\Controller;

/**
 * Controller for general site pages
 */
class SiteController extends Controller
{
  /**
   * Output front page view
   */
  public function frontPage()
  {
    $this->timber->render('front-page.twig', $this->timber->get_context());
  }

  /**
   * Output index view
   */
  public function index()
  {
    $this->timber->render('index.twig', $this->timber->get_context());
  }
}
