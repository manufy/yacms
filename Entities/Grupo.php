<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entities\Grupo
 *
 * @Table(name="Grupos")
 * @Entity
 */
class Grupo
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
     * @var string $nombre
     *
     * @Column(name="nombre", type="string", length=50)
     */
    private $nombre;


    /**
     * Set id
     *
     * @param integer $id
     * @return Grupo
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
     * @return Grupo
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
}