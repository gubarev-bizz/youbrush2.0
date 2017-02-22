<?php

namespace YouBrush\Bundle\ThemeBundle\Constructor;

use YouBrush\Bundle\ThemeBundle\Constructor\Component\ComponentProcessorInterface;
use YouBrush\Bundle\ThemeBundle\Entity\Theme;

class ConstructorManager
{
    /**
     * @var ComponentProcessorInterface[]
     */
    private $components;

    /**
     * @param string $type
     * @param ComponentProcessorInterface $component
     */
    public function registerComponent($type, ComponentProcessorInterface $component)
    {
        $this->components[$type] = $component;
    }

    /**
     * @param Theme $theme
     */
    public function process(Theme $theme)
    {

    }
}
