<?php

namespace projetL3\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\Role\RoleInterface;

/**
 * Role
 *
 * @ORM\Table(name="role")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Role implements RoleInterface {

    /**
     * @var integer
     *
     * @ORM\Column(name="idrole", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idrole;

    /**
     * @var string
     *
     * @ORM\Column(name="name_role", type="string", length=50, nullable=true, unique=true)
     */
    private $nameRole;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @ORM\ManyToMany(targetEntity="\projetL3\UserBundle\Entity\User", mappedBy="userRoles", cascade={"persist"})
     */
    private $roleUsers;

    public function __construct()
    {
        $this->createdAt = new \DateTime('now');
        $this->roleUsers = new ArrayCollection();
    }

    /**
     * Get idrole
     *
     * @return integer
     */
    public function getIdrole()
    {
        return $this->idrole;
    }

    /**
     * Set nameRole
     *
     * @param string $nameRole
     * @return $this
     */
    public function setNameRole($nameRole)
    {
        $this->nameRole = $nameRole;

        return $this;
    }

    /**
     * Get nameRole
     *
     * @return string
     */
    public function getNameRole()
    {
        return $this->nameRole;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Returns the role
     *
     * @return string The Role
     */
    public function getRole()
    {
        return $this->getNameRole();
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $roleUsers
     */
    public function setRoleUsers(\Doctrine\Common\Collections\ArrayCollection $roleUsers)
    {
        $this->roleUsers = $roleUsers;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getRoleUsers()
    {
        return $this->roleUsers;
    }
}