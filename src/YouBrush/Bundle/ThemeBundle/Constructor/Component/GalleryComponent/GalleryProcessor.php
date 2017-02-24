<?php

namespace YouBrush\Bundle\ThemeBundle\Constructor\Component\GalleryComponent;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use YouBrush\Bundle\ThemeBundle\Constructor\Component\ComponentAbstract;
use YouBrush\Bundle\ThemeBundle\Constructor\Component\ComponentProcessorInterface;
use YouBrush\Bundle\ThemeBundle\Entity\Repository\ComponentGalleryRepository;
use YouBrush\Bundle\ThemeBundle\Entity\Repository\ComponentRepository;
use YouBrush\Bundle\ThemeBundle\Entity\Theme;

class GalleryProcessor extends ComponentAbstract implements ComponentProcessorInterface
{
    /**
     * @var string
     */
    protected $componentName = 'gallery';

    /**
     * @var ComponentGalleryRepository
     */
    private $componentGalleryRepository;

    /**
     * @param EntityManager $em
     * @param ComponentRepository $componentRepository
     * @param TokenStorage $tokenStorage
     * @param ComponentGalleryRepository $componentGalleryRepository
     */
    public function __construct(
        EntityManager $em,
        ComponentRepository $componentRepository,
        TokenStorage $tokenStorage,
        ComponentGalleryRepository $componentGalleryRepository
    ) {
        parent::__construct($em, $componentRepository, $tokenStorage);
        $this->componentGalleryRepository = $componentGalleryRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function process(Theme $theme)
    {
        $component = $this->getEntity();
        $a = 1;
    }

    public function form()
    {
//        $form = $this->form->c
    }

    /**
     * {@inheritdoc}
     */
    public function getEntity()
    {
        return $this->componentRepository->findOneBy([
            'systemName' => $this->componentName,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    protected function getComponent()
    {
        return $this->componentRepository->findOneBy([
            'systemName' => $this->componentName,
        ]);
    }
}
