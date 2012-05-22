<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entities\MenuAdmin
 *
 * @Table(name="MenuAdmin")
 * @Entity
 */
class MenuAdmin
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
     * @var string $template
     *
     * @Column(name="template", type="string")
     */
    private $template;


    /**
     * Set id
     *
     * @param integer $id
     * @return MenuAdmin
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
     * @return MenuAdmin
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

    /**
     * Set template
     *
     * @param string $template
     * @return MenuAdmin
     */
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }

    /**
     * Get template
     *
     * @return string 
     */
    public function getTemplate()
    {
        return $this->template;
    }
}