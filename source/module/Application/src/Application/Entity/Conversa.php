<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Hydrator\ClassMethods;
/**
 * Conversa
 *
 * @ORM\Table(name="conversa", indexes={@ORM\Index(name="fk_conversa_chamado1_idx", columns={"chamado_id"})})
 * @ORM\Entity
 */
class Conversa
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
     * @var string
     *
     * @ORM\Column(name="texto", type="text", nullable=false)
     */
    private $texto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="enviado_em", type="datetime", nullable=false)
     */
    private $enviadoEm = 'CURRENT_TIMESTAMP';

    /**
     * @var \Application\Entity\Chamado
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Chamado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="chamado_id", referencedColumnName="id")
     * })
     */
    private $chamado;

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
     * @return string
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * @param string $texto
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;
    }

    /**
     * @return \DateTime
     */
    public function getEnviadoEm()
    {
        return $this->enviadoEm;
    }

    /**
     * @param \DateTime $enviadoEm
     */
    public function setEnviadoEm($enviadoEm)
    {
        $this->enviadoEm = $enviadoEm;
    }

    /**
     * @return Chamado
     */
    public function getChamado()
    {
        return $this->chamado;
    }

    /**
     * @param Chamado $chamado
     */
    public function setChamado($chamado)
    {
        $this->chamado = $chamado;
    }

    public function __toString(){
        return $this->getId();
    }

}

