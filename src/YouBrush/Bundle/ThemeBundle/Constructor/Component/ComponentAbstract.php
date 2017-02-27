<?php

namespace YouBrush\Bundle\ThemeBundle\Constructor\Component;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use JMS\Serializer\Serializer;
use Symfony\Bridge\Twig\TwigEngine;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use YouBrush\Bundle\CoreBundle\Entity\User;
use YouBrush\Bundle\ThemeBundle\Entity\Component;
use YouBrush\Bundle\ThemeBundle\Entity\Repository\ComponentRepository;

abstract class ComponentAbstract
{
    /**
     * @var string
     */
    protected $componentName;

    /**
     * @var string
     */
    protected $baseTemplate;

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
     * @var Serializer
     */
    protected $serializer;

    /**
     * @var FormFactory
     */
    protected $formFactory;

    /**
     * @var TwigEngine
     */
    protected $engine;

    /**
     * @param EntityManager $em
     * @param ComponentRepository $componentRepository
     * @param TokenStorage $token
     * @param Serializer $serializer
     * @param FormFactory $formFactory
     * @param TwigEngine $engine
     */
    public function __construct(
        EntityManager $em,
        ComponentRepository $componentRepository,
        TokenStorage $token,
        Serializer $serializer,
        FormFactory $formFactory,
        TwigEngine $engine
    ) {
        $this->em = $em;
        $this->componentRepository = $componentRepository;
        $this->token = $token;
        $this->serializer = $serializer;
        $this->formFactory = $formFactory;
        $this->engine = $engine;
    }

    /**
     * @return Component|null
     */
    protected abstract function getComponent();

    /**
     * @return null|User
     */
    protected function getUser()
    {
        return $this->token->getToken()->getUser();
    }
}
