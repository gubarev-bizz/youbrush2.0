<?php

namespace YouBrush\Bundle\ThemeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route
 */
class ThemeController extends Controller
{
    /**
     * @param $name
     * @return Response
     */
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }
}
