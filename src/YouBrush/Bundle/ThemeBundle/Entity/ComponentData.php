<?php

namespace YouBrush\Bundle\ThemeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as SymfonyConstraints;
use YouBrush\Bundle\ThemeBundle\Entity\Traits\IdentifiableEntityTrait;

/**
 * @ORM\Entity
 */
class ComponentData
{
    use IdentifiableEntityTrait;
}
