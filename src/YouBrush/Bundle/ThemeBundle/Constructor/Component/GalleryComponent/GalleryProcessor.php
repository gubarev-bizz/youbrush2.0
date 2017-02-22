<?php

namespace YouBrush\Bundle\ThemeBundle\Constructor\Component\GalleryComponent;

use YouBrush\Bundle\ThemeBundle\Constructor\Component\ComponentProcessorInterface;
use YouBrush\Bundle\ThemeBundle\Entity\Theme;

class GalleryProcessor implements ComponentProcessorInterface
{

    /**
     * @param Theme $theme
     * @return mixed
     */
    public function process(Theme $theme)
    {
        return ['gallery'];
    }
}
