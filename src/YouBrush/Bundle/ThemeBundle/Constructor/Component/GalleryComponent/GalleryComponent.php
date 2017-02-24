<?php

namespace YouBrush\Bundle\ThemeBundle\Constructor\Component\GalleryComponent;

use Doctrine\ORM\EntityManager;
use JMS\Serializer\Serializer;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use YouBrush\Bundle\ThemeBundle\Constructor\Component\ComponentAbstract;
use YouBrush\Bundle\ThemeBundle\Constructor\Component\ComponentProcessorInterface;
use YouBrush\Bundle\ThemeBundle\Constructor\Component\GalleryComponent\Form\ViewType;
use YouBrush\Bundle\ThemeBundle\Entity\Repository\ComponentGalleryRepository;
use YouBrush\Bundle\ThemeBundle\Entity\Repository\ComponentRepository;
use YouBrush\Bundle\ThemeBundle\Entity\Theme;

class GalleryComponent extends ComponentAbstract implements ComponentProcessorInterface
{
    /**
     * {@inheritdoc}
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
     * @param Serializer $serializer
     * @param FormFactory $formFactory
     * @param ComponentGalleryRepository $componentGalleryRepository
     */
    public function __construct(
        EntityManager $em,
        ComponentRepository $componentRepository,
        TokenStorage $tokenStorage,
        Serializer $serializer,
        FormFactory $formFactory,
        ComponentGalleryRepository $componentGalleryRepository
    ) {
        parent::__construct($em, $componentRepository, $tokenStorage, $serializer, $formFactory);
        $this->componentGalleryRepository = $componentGalleryRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function build(Theme $theme)
    {
        $components = $this->getEntity();
        $form = $this->formFactory->create(ViewType::class)->createView();

        return $this->serializer->serialize([
            'components' => $components,
            'form' => $form,
        ], 'json');
    }

    /**
     * {@inheritdoc}
     */
    public function getEntity()
    {
        return $this->componentGalleryRepository->findByUser($this->getUser());
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
