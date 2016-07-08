<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Hydrator\ClassMethods;
/**
 * Consultor
 *
 * @ORM\Table(name="consultor", indexes={@ORM\Index(name="fk_contador_usuario1_idx", columns={"usuario_id"})})
 * @ORM\Entity
 */
class Consultor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Application\Entity\Usuario
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     * })
     */
    private $usuario;

    public function __construct(array $options = array()){
        (new ClassMethods())->hydrate($options, $this);
    }

    public function toArray(){
        return (new ClassMethods())->extract($this);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return \Application\Entity\Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getNome(){
      return $this->getUsuario()->getNome();
    }

    public function getEmail(){
        return $this->getUsuario()->getEmail();
    }

    /**
     * @param \Application\Entity\Usuario $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function __toString(){
        return $this->getUsuario()->getNome();
    }

}

