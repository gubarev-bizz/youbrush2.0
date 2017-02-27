<?php

namespace YouBrush\Bundle\ThemeBundle\Theme;

use Doctrine\ORM\EntityManager;
use YouBrush\Bundle\ThemeBundle\Entity\Theme;
use YouBrush\Bundle\ThemeBundle\Theme\Themes\ThemeInterface;

class ThemeManager
{
    /**
     * @var ThemeInterface[]
     */
    private $themes;

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
     * @param ThemeInterface $theme
     */
    public function registerTheme($type, ThemeInterface $theme)
    {
        $this->themes[$type] = $theme;
    }

    /**
     * @param Theme $theme
     */
    public function process(Theme $theme)
    {

    }

    public function render(Theme $theme)
    {
        foreach ($this->themes as $type => $themeInstance) {
            if ($type === $theme->getSystemName()) {
                return $themeInstance->render();
            }
        }

        return null;
    }
}
