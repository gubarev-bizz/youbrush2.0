<?php

namespace YouBrush\Bundle\ThemeBundle\Controller;

use JMS\Serializer\SerializationContext;
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

        $layoutTheme = $this->get('youbrush_theme_bundle.theme.manager')->render($theme);

        return $this->render('YouBrushThemeBundle:Constructor:item.html.twig', [
            'theme' => $theme,
            'layoutTheme' => $layoutTheme,
        ]);
    }

    /**
     * @param string $themeId
     * @return Response
     */
    public function loadThemeComponentsAction($themeId)
    {
        $theme = $this->getDoctrine()->getRepository('YouBrushThemeBundle:Theme')
            ->find($themeId)
        ;
        $response = $this->get('youbrush_theme_bundle.constructor_manager')
            ->process($theme)
        ;

        $context = new SerializationContext();
        $context->setSerializeNull(true);
        $serializer = $this->get('jms_serializer');


        return new Response($serializer->serialize($response, 'json', $context));
    }
}
