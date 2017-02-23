<?php

namespace YouBrush\Bundle\ThemeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as SymfonyConstraints;
use YouBrush\Bundle\ThemeBundle\Entity\Traits\IdentifiableEntityTrait;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="YouBrush\Bundle\ThemeBundle\Entity\Repository\ComponentRepository")
 * @UniqueEntity(fields="systemName", message="This system name is already in use.")
 */
class Component
{
    use IdentifiableEntityTrait;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @SymfonyConstraints\NotBlank()
     */
    private $systemName;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @SymfonyConstraints\NotBlank()
     */
    private $systemLegalName;

    /**
     * @ORM\ManyToMany(targetEntity="Theme", inversedBy="components", cascade={"persist"})
     * @ORM\JoinTable(name="theme_components")
     */
    private $themes;

    /**
     * @return string
     */
    public function getSystemName()
    {
        return $this->systemName;
    }

    /**
     * @param string $systemName
     */
    public function setSystemName($systemName)
    {
        $this->systemName = $systemName;
    }

    /**
     * @return string
     */
    public function getSystemLegalName()
    {
        return $this->systemLegalName;
    }

    /**
     * @param string $systemLegalName
     */
    public function setSystemLegalName($systemLegalName)
    {
        $this->systemLegalName = $systemLegalName;
    }

    /**
     * @param Theme $themes
     */
    public function addTheme(Theme $themes)
    {
        $this->themes[] = $themes;
    }

    /**
     * @return Theme[]
     */
    public function getThemes()
    {
        return $this->themes;
    }

    /**
     * @param Theme[] $themes
     */
    public function setThemes($themes)
    {
        $this->themes = $themes;
    }
}
