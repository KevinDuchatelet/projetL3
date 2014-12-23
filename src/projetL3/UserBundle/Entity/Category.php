<?php

namespace projetL3\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Category
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idcategory", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcategory;

    /**
     * @var string
     *
     * @ORM\Column(name="name_category", type="string", length=50, nullable=true, unique=true)
     */
    private $nameCategory;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity="\projetL3\UserBundle\Entity\User", mappedBy="category")
     */
    private $users;

    public function __construct()
    {
        $this->createdAt = new \DateTime('now');
        $this->categoryUsers = new ArrayCollection();
    }

    /**
     * Get idcategory
     *
     * @return integer
     */
    public function getIdcategory()
    {
        return $this->idcategory;
    }

    /**
     * Set nameCategory
     *
     * @param string $nameCategory
     * @return $this
     */
    public function setNameCategory($nameCategory)
    {
        $this->nameCategory = $nameCategory;

        return $this;
    }

    /**
     * Get nameCategory
     *
     * @return string
     */
    public function getNameCategory()
    {
        return $this->nameCategory;
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
     * Set users
     *
     * @param string $users
     * @return $this
     */
    public function setUsers($users)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return string
     */
    public function getUsers()
    {
        return $this->users;
    }
}
