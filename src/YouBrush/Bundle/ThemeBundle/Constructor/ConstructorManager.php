<?php

namespace YouBrush\Bundle\ThemeBundle\Constructor;

use Doctrine\ORM\EntityManager;
use YouBrush\Bundle\ThemeBundle\Constructor\Component\ComponentProcessorInterface;
use YouBrush\Bundle\ThemeBundle\Entity\Theme;

class ConstructorManager
{
    /**
     * @var ComponentProcessorInterface[]
     */
    private $components;

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

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
     * @return array
     */
    public function process(Theme $theme)
    {
        $components = $this->em->getRepository('YouBrushThemeBundle:Component')
            ->findByTheme($theme)
        ;
        $processes = [];

        foreach ($components as $component) {
            if (in_array($component->getSystemName(), array_keys($this->components))) {
                $processes['components'][$component->getSystemName()] = $this->components[$component->getSystemName()]->build($theme);
            }
        }

        return $processes;
    }
}
