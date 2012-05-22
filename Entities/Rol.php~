<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entities\Rol
 *
 * @Table(name="Roles")
 * @Entity
 */
class Rol
{
    /**
     * @var string $id
     *
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @Column(name="name", type="string", length=50)
     */
    private $name;


    /**
     * Set id
     *
     * @param integer $id
     * @return Rol
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Rol
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
}