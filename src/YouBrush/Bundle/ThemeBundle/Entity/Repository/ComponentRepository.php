<?php

namespace YouBrush\Bundle\ThemeBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use YouBrush\Bundle\ThemeBundle\Entity\Component;
use YouBrush\Bundle\ThemeBundle\Entity\Theme;

class ComponentRepository extends EntityRepository
{
    /**
     * @param Theme $theme
     * @return Component[]
     */
    public function findByTheme(Theme $theme)
    {
        return $this->createQueryBuilder('c')
            ->leftJoin('c.themes', 't')
            ->where('t = :theme')
            ->setParameter('theme', $theme)
            ->getQuery()
            ->getResult()
            ;
    }
}
