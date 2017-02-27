<?php

namespace YouBrush\Bundle\ThemeBundle\Theme\Themes\LandingPage;

use Symfony\Bundle\TwigBundle\TwigEngine;
use YouBrush\Bundle\ThemeBundle\Constructor\ConstructorManager;
use YouBrush\Bundle\ThemeBundle\Entity\Theme;
use YouBrush\Bundle\ThemeBundle\Theme\Themes\ThemeInterface;

class LandingPageTheme implements ThemeInterface
{
    /**
     * @var TwigEngine
     */
    private $engine;

    /**
     * @var ConstructorManager
     */
    private $constructorManager;

    /**
     * @param TwigEngine $engine
     * @param ConstructorManager $constructorManager
     */
    public function __construct(TwigEngine $engine, ConstructorManager $constructorManager)
    {
        $this->engine = $engine;
        $this->constructorManager = $constructorManager;
    }

    public function build()
    {
        // TODO: Implement build() method.
    }

    public function render(Theme $theme)
    {
        $components = $this->getComponents($theme);

        return $this->engine->render('YouBrushThemeBundle:Theme/LandingPage:layout.html.twig', [
            'components' => $components,
        ]);
    }

    public function getComponents(Theme $theme)
    {
        $components = $theme->getComponents();
        $data = [];

        foreach ($components as $component) {
            $data[$component->getSystemName()] = $this->constructorManager->getComponent($component->getSystemName());
        }

        return $data;
    }
}
