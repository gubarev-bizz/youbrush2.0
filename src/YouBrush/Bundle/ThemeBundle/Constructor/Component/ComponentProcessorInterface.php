<?php

namespace YouBrush\Bundle\ThemeBundle\Constructor\Component;

use YouBrush\Bundle\ThemeBundle\Entity\Theme;

interface ComponentProcessorInterface
{
    /**
     * @param Theme $theme
     * @return mixed
     */
    public function process(Theme $theme);
}