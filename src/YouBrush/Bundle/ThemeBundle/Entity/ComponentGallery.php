<?php

namespace YouBrush\Bundle\ThemeBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as SymfonyConstraints;
use YouBrush\Bundle\CoreBundle\Entity\Traits\IdentifiableEntityTrait;
use YouBrush\Bundle\CoreBundle\Entity\User;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass="YouBrush\Bundle\ThemeBundle\Entity\Repository\ComponentGalleryRepository")
 * @Serializer\ExclusionPolicy("all")
 */
class ComponentGallery
{
    use IdentifiableEntityTrait;

    /**
     * @var string
     *
     * @Serializer\Expose
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
     * @var ComponentGalleryImage[]|ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="ComponentGalleryImage", mappedBy="gallery")
     */
    private $galleryImages;

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

    /**
     * @return ArrayCollection|ComponentGalleryImage[]
     */
    public function getGalleryImages()
    {
        return $this->galleryImages;
    }

    /**
     * @param ArrayCollection|ComponentGalleryImage[] $galleryImages
     */
    public function setGalleryImages($galleryImages)
    {
        $this->galleryImages = $galleryImages;
    }
}
