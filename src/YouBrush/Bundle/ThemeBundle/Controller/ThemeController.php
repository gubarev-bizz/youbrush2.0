<?php

namespace YouBrush\Bundle\ThemeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ThemeController extends Controller
{
    /**
     * @return Response
     */
    public function themeListAction()
    {
        $em = $this->getDoctrine();
        $themes = $em->getRepository('YouBrushThemeBundle:Theme')->findAll();

        return $this->render('YouBrushThemeBundle:Theme:list.html.twig', [
            'themes' => $themes,
        ]);
    }
}
