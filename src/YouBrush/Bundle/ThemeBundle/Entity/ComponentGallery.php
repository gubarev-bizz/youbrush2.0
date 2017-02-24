<?php

namespace YouBrush\Bundle\ThemeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as SymfonyConstraints;
use YouBrush\Bundle\CoreBundle\Entity\Traits\IdentifiableEntityTrait;
use YouBrush\Bundle\CoreBundle\Entity\User;

/**
 * @ORM\Entity(repositoryClass="YouBrush\Bundle\ThemeBundle\Entity\Repository\ComponentGalleryRepository")
 */
class ComponentGallery
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
     * @ORM\ManyToMany(targetEntity="YouBrush\Bundle\CoreBundle\Entity\User", inversedBy="componentGalleries", cascade={"persist"})
     * @ORM\JoinTable(name="components_users_gallery")
     */
    private $users;

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
     * @param User $user
     */
    public function addUser(User $user)
    {
        $this->users[] = $user;
    }

    /**
     * @return User[]
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param User[] $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }
}
