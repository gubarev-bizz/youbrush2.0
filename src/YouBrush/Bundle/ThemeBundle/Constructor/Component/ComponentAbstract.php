<?php

namespace YouBrush\Bundle\ThemeBundle\Constructor\Component;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use YouBrush\Bundle\ThemeBundle\Entity\Component;
use YouBrush\Bundle\ThemeBundle\Entity\Repository\ComponentRepository;

abstract class ComponentAbstract
{
    protected $componentName;

    /**
     * @var EntityManager
     */
    public $em;

    /**
     * @var ComponentRepository
     */
    protected $componentRepository;

    /**
     * @var TokenStorage
     */
    protected $token;

    /**
     * @param EntityManager $em
     * @param ComponentRepository $componentRepository
     * @param TokenStorage $token
     */
    public function __construct(EntityManager $em, ComponentRepository $componentRepository, TokenStorage $token)
    {
        $this->em = $em;
        $this->componentRepository = $componentRepository;
        $this->token = $token;
    }

    /**
     * @return Component|null
     */
    protected abstract function getComponent();

    /**
     * @return null|TokenInterface
     */
    protected function getToken()
    {
        return $this->token->getToken();
    }
}
