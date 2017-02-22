<?php

namespace YouBrush\Bundle\ThemeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as SymfonyConstraints;
use YouBrush\Bundle\ThemeBundle\Entity\Traits\IdentifiableEntityTrait;

/**
 * @ORM\Entity
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
}