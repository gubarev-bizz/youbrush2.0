<?php

namespace YouBrush\Bundle\ThemeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ConstructorController extends Controller
{
    /**
     * @param int $themeId
     * @return Response
     */
    public function itemAction($themeId)
    {
        $theme = $this->getDoctrine()->getRepository('YouBrushThemeBundle:Theme')
            ->find($themeId)
        ;

        if ($theme === null) {
            throw new NotFoundHttpException(sprintf("Theme with id = %s not found.", $themeId));
        }



        return $this->render('YouBrushThemeBundle:Constructor:item.html.twig');
    }
}
