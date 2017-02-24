<?php

namespace YouBrush\Bundle\ThemeBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use YouBrush\Bundle\CoreBundle\Entity\User;
use YouBrush\Bundle\ThemeBundle\Entity\ComponentGallery;

class ComponentGalleryRepository extends EntityRepository implements InterfaceComponentRepository
{
    /**
     * @param User $user
     * @return array|ComponentGallery[]
     */
    public function findByUser(User $user)
    {
        return $this->createQueryBuilder('cg')
            ->leftJoin('cg.users', 'user')
            ->where('user = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult()
            ;
    }
}
