<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Hydrator\ClassMethods;
/**
 * Transferencia
 *
 * @ORM\Table(name="transferencia", indexes={@ORM\Index(name="fk_transferencias_conta1_idx", columns={"origem"}), @ORM\Index(name="fk_transferencias_conta2_idx", columns={"destino"})})
 * @ORM\Entity
 */
class Transferencia
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
     * @ORM\Column(name="data", type="datetime", nullable=false)
     */
    private $data = 'CURRENT_TIMESTAMP';

    /**
     * @var float
     *
     * @ORM\Column(name="valor", type="float", precision=10, scale=0, nullable=true)
     */
    private $valor;

    /**
     * @var \Application\Entity\Conta
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Conta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="origem", referencedColumnName="id")
     * })
     */
    private $origem;

    /**
     * @var \Application\Entity\Conta
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Conta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="destino", referencedColumnName="id")
     * })
     */
    private $destino;

    /**
     * @var \Application\Entity\Cliente
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Cliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cliente_id", referencedColumnName="id")
     * })
     */
    private $cliente;

    public function __construct(array $options = array()){
        $this->data = new \DateTime('now');
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
    public function getData()
    {
        return     $this->data;
    }


    /**
     * @return float
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param float $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    /**
     * @return Conta
     */
    public function getOrigem()
    {
        return $this->origem;
    }

    /**
     * @param Conta $origem
     */
    public function setOrigem($origem)
    {
        $this->origem = $origem;
    }

    /**
     * @return Conta
     */
    public function getDestino()
    {
        return $this->destino;
    }

    /**
     * @param Conta $destino
     */
    public function setDestino($destino)
    {
        $this->destino = $destino;
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



    public function __toString(){
        return 'Transferencia ' . $this->getId();
    }

}

