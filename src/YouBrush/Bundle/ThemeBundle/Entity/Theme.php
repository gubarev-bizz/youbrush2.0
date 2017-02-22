<?php

namespace YouBrush\Bundle\ThemeBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as SymfonyConstraints;
use YouBrush\Bundle\ThemeBundle\Entity\Traits\IdentifiableEntityTrait;

/**
 * @ORM\Entity
 */
class Theme
{
    use IdentifiableEntityTrait;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @SymfonyConstraints\NotBlank()
     */
    private $title;

    /**
     * @var ArrayCollection|Component[]
     *
     * @ORM\ManyToMany(targetEntity="Component", mappedBy="themes", cascade={"persist"})
     */
    protected $components;

    public function __construct()
    {
        $this->components = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return ArrayCollection|Component[]
     */
    public function getComponents()
    {
        return $this->components;
    }

    /**
     * @param Component $components
     */
    public function setComponents($components)
    {
        $this->components = $components;
    }

    /**
     * @param Component $component
     * @return $this
     */
    public function addComponent(Component $component)
    {
        $this->components[] = $component;

        return $this;
    }
}
