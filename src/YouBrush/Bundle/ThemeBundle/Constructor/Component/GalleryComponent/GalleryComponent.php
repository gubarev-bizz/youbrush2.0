<?php

namespace YouBrush\Bundle\ThemeBundle\Constructor\Component\GalleryComponent;

use Doctrine\ORM\EntityManager;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\Serializer;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Form\FormView;
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
     * {@inheritdoc}
     */
    protected $baseTemplate = 'YouBrushThemeBundle:Constructor/Component:form.html.twig';

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
     * @param TwigEngine $engine
     * @param ComponentGalleryRepository $componentGalleryRepository
     */
    public function __construct(
        EntityManager $em,
        ComponentRepository $componentRepository,
        TokenStorage $tokenStorage,
        Serializer $serializer,
        FormFactory $formFactory,
        TwigEngine $engine,
        ComponentGalleryRepository $componentGalleryRepository
    ) {
        parent::__construct($em, $componentRepository, $tokenStorage, $serializer, $formFactory, $engine);
        $this->componentGalleryRepository = $componentGalleryRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function build(Theme $theme)
    {
        $context = new SerializationContext();
        $context->setSerializeNull(true);
        $components = $this->getEntity();
        $form = $this->formFactory->create(ViewType::class)->createView();
        $formView = $this->getForm($form);

        return [
            'entities' => $components,
            'form' => $formView,
        ];
    }

    public function getForm(FormView $formView)
    {
        return $this->engine->render('YouBrushThemeBundle:Constructor/Component:form.html.twig', [
            'form' => $formView,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getEntity()
    {
        return $this->componentGalleryRepository->findAll();
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

    public function view()
    {
        return $this->engine->render('YouBrushThemeBundle:Constructor/Component/GalleryComponent:widget.html.twig');
    }
}
