<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Hydrator\ClassMethods;
/**
 * Chamado
 *
 * @ORM\Table(name="chamado", indexes={@ORM\Index(name="fk_chamado_consultor1_idx", columns={"consultor_id"}), @ORM\Index(name="fk_chamado_cliente1_idx", columns={"cliente_id"})})
 * @ORM\Entity
 */
class Chamado
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
     * @var \DateTime
     *
     * @ORM\Column(name="abero_em", type="datetime", nullable=false)
     */
    private $aberoEm = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechado_em", type="datetime", nullable=true)
     */
    private $fechadoEm;

    /**
     * @var \Application\Entity\Cliente
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Cliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cliente_id", referencedColumnName="id")
     * })
     */
    private $cliente;

    /**
     * @var \Application\Entity\Consultor
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Consultor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="consultor_id", referencedColumnName="id")
     * })
     */
    private $consultor;

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
     * @return \DateTime
     */
    public function getAberoEm()
    {
        return $this->aberoEm;
    }

    /**
     * @param \DateTime $aberoEm
     */
    public function setAberoEm($aberoEm)
    {
        $this->aberoEm = $aberoEm;
    }

    /**
     * @return \DateTime
     */
    public function getFechadoEm()
    {
        return $this->fechadoEm;
    }

    /**
     * @param \DateTime $fechadoEm
     */
    public function setFechadoEm($fechadoEm)
    {
        $this->fechadoEm = $fechadoEm;
    }

    /**
     * @return Cliente
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param Cliente $cliente
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * @return Consultor
     */
    public function getConsultor()
    {
        return $this->consultor;
    }

    /**
     * @param Consultor $consultor
     */
    public function setConsultor($consultor)
    {
        $this->consultor = $consultor;
    }

    public function __toString(){
        return $this->getId();
    }
}

