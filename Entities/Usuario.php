<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entities\Usuario
 *
 * @Table(name="Usuarios")
 * @Entity
 */
class Usuario
{
    /**
     * @var integer $id
     *
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $nombre
     *
     * @Column(name="nombre", type="string", length=50)
     */
    private $nombre;

    /**
     * @var string $password
     *
     * @Column(name="password", type="string")
     */
    private $password;


    /**
     * Set id
     *
     * @param integer $id
     * @return Usuario
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
     * Set nombre
     *
     * @param string $nombre
     * @return Usuario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }
}