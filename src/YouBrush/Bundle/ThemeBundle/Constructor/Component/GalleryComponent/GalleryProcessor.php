<?php

namespace YouBrush\Bundle\ThemeBundle\Constructor\Component\GalleryComponent;

use YouBrush\Bundle\ThemeBundle\Constructor\Component\ComponentAbstract;
use YouBrush\Bundle\ThemeBundle\Constructor\Component\ComponentProcessorInterface;
use YouBrush\Bundle\ThemeBundle\Entity\Theme;

class GalleryProcessor extends ComponentAbstract implements ComponentProcessorInterface
{
    /**
     * @var string
     */
    protected $componentName = 'gallery';

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
        return $this->repository->findOneBy([
            'systemName' => $this->componentName,
        ]);
    }
}
