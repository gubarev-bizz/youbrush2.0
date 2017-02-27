<?php

namespace YouBrush\Bundle\ThemeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as SymfonyConstraints;
use YouBrush\Bundle\CoreBundle\Entity\Traits\IdentifiableEntityTrait;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity
 * @Serializer\ExclusionPolicy("all")
 */
class ComponentGalleryImage
{
    use IdentifiableEntityTrait;

    /**
     * @ORM\ManyToOne(targetEntity="ComponentGallery", inversedBy="galleryImages")
     */
    private $gallery;

    /**
     * @return mixed
     */
    public function getGallery()
    {
        return $this->gallery;
    }

    /**
     * @param mixed $gallery
     */
    public function setGallery($gallery)
    {
        $this->gallery = $gallery;
    }
}
