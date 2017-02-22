<?php

namespace YouBrush\Bundle\ThemeBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use YouBrush\Bundle\ThemeBundle\DependencyInjection\CompilerPass\RegisterComponentHandlersPass;
use YouBrush\Bundle\ThemeBundle\DependencyInjection\YouBrushThemeBundleExtension;

class YouBrushThemeBundle extends Bundle
{
    /**
     * {@inheritDoc}
     */
    public function getContainerExtension()
    {
        return new YouBrushThemeBundleExtension();
    }

    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new RegisterComponentHandlersPass());
    }
}
