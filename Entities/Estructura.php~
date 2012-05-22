<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entities\Estructura
 *
 * @Table(name="Estructuras")
 * @Entity
 */
class Estructura
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
     * @var string $titulo
     *
     * @Column(name="titulo", type="string", length=50)
     */
    private $titulo;


    /**
     * Set id
     *
     * @param string $id
     * @return Estructura
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
     * @return Estructura
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