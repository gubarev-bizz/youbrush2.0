<?php

namespace YouBrush\Bundle\ThemeBundle\Theme\Themes;

use YouBrush\Bundle\ThemeBundle\Entity\Theme;

interface ThemeInterface
{
    public function build();

    public function render(Theme $theme);
}
