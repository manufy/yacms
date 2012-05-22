<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entities\Contenido
 *
 * @Table(name="Contenidos")
 * @Entity
 */
class Contenido
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
     * @var string $titulo
     *
     * @Column(name="titulo", type="string", length=50)
     */
    private $titulo;


    /**
     * Set id
     *
     * @param integer $id
     * @return Contenido
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
     * Set titulo
     *
     * @param string $titulo
     * @return Contenido
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }
}