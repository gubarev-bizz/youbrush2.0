<?php

namespace YouBrush\Bundle\ThemeBundle\Theme\Themes;


interface ThemeInterface
{
    public function build();

    public function render();
}
