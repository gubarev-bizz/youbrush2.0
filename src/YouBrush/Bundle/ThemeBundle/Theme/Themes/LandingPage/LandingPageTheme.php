<?php

namespace YouBrush\Bundle\ThemeBundle\Theme\Themes\LandingPage;

use Symfony\Bundle\TwigBundle\TwigEngine;
use YouBrush\Bundle\ThemeBundle\Theme\Themes\ThemeInterface;

class LandingPageTheme implements ThemeInterface
{

    /**
     * @var TwigEngine
     */
    private $engine;

    public function __construct(TwigEngine $engine)
    {
        $this->engine = $engine;
    }

    public function build()
    {
        // TODO: Implement build() method.
    }

    public function render()
    {
        return $this->engine->render('YouBrushThemeBundle:Theme/LandingPage:layout.html.twig');
    }
}
