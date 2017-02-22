<?php

namespace YouBrush\Bundle\ThemeBundle\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class RegisterComponentHandlersPass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        $aggregationDefinition = $container->getDefinition('youbrush_theme_bundle.constructor_manager');
        $handlers = $container->findTaggedServiceIds('youbrush_theme_bundle.components');

        foreach ($handlers as $id => $attributes) {
            foreach ($attributes as $attribute) {
                $aggregationDefinition
                    ->addMethodCall('registerComponent', [$attribute['type'], new Reference($id)])
                ;
            }
        }
    }
}
