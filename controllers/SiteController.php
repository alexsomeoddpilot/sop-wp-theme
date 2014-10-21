<?php

namespace someoddpilot\wptheme\controllers;

use someoddpilot\wpbase\controllers\Controller;

class SiteController extends Controller
{
  public function frontPage()
  {
    $this->timber->render('front-page.twig', $this->timber->get_context());
  }

  public function index()
  {
    $this->timber->render('index.twig', $this->timber->get_context());
  }
}
