<?php

namespace YouBrush\Bundle\CoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use YouBrush\Bundle\CoreBundle\Entity\Traits\IdentifiableEntityTrait;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\Role\Role;
use YouBrush\Bundle\ThemeBundle\Entity\ComponentGallery;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 * @UniqueEntity(fields={"email"}, message="This email address is already used")
 */
class User implements UserInterface
{
    use IdentifiableEntityTrait;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true
     * )
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @Assert\Type(type="string")
     */
    protected $plainPassword;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     * )
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    protected $type;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", options={"default":0})
     */
    private $status;

    /**
     * @ORM\ManyToMany(targetEntity="YouBrush\Bundle\ThemeBundle\Entity\ComponentGallery", mappedBy="users", cascade={"persist"})
     */
    private $componentGalleries;

    public function __construct()
    {
        $this->componentGalleries = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return boolean
     */
    public function isStatus()
    {
        return $this->status;
    }

    /**
     * @param boolean $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->getEmail();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getUsername();
    }

    /**
     * Returns the roles granted to the user.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return Role[] The user roles
     */
    public function getRoles()
    {
        return ['ROLE_' . strtoupper($this->getType())];
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        $this->setPlainPassword(null);
    }

    /**
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param string $plainPassword
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return ComponentGallery[]|ArrayCollection
     */
    public function getComponentGalleries()
    {
        return $this->componentGalleries;
    }

    /**
     * @param ComponentGallery $componentGalleries
     */
    public function setComponentGalleries($componentGalleries)
    {
        $this->componentGalleries = $componentGalleries;
    }

    /**
     * @param ComponentGallery $componentGallery
     * @return $this
     */
    public function addComponentGallery(ComponentGallery $componentGallery)
    {
        $this->componentGalleries[] = $componentGallery;

        return $this;
    }
}
