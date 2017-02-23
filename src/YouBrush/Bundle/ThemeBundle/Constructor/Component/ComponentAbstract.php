<?php

namespace YouBrush\Bundle\ThemeBundle\Constructor\Component;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

abstract class ComponentAbstract
{
    protected $componentName = '';

    /**
     * @var EntityManager
     */
    public $em;

    /**
     * @var EntityRepository
     */
    public $repository;

    /**
     * @param EntityManager $em
     * @param EntityRepository $repository
     */
    public function __construct(EntityManager $em, EntityRepository $repository)
    {
        $this->em = $em;
        $this->repository = $repository;
    }
}
