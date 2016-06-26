<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Hydrator\ClassMethods;
/**
 * Cartao
 *
 * @ORM\Table(name="cartao", indexes={@ORM\Index(name="fk_cartao_cliente1_idx", columns={"cliente_id"})})
 * @ORM\Entity
 */
class Cartao
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
     * @ORM\Column(name="nome", type="string", length=45, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="bandeira", type="string", length=45, nullable=false)
     */
    private $bandeira;

    /**
     * @var integer
     *
     * @ORM\Column(name="dia_fechamento_fatura", type="integer", nullable=false)
     */
    private $diaFechamentoFatura;

    /**
     * @var integer
     *
     * @ORM\Column(name="dia_vencimento_fatura", type="integer", nullable=false)
     */
    private $diaVencimentoFatura;

    /**
     * @var float
     *
     * @ORM\Column(name="limite", type="float", precision=10, scale=0, nullable=false)
     */
    private $limite;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ativo", type="boolean", nullable=false)
     */
    private $ativo = '1';

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
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function getBandeira()
    {
        return $this->bandeira;
    }

    /**
     * @param string $bandeira
     */
    public function setBandeira($bandeira)
    {
        $this->bandeira = $bandeira;
    }

    /**
     * @return int
     */
    public function getDiaFechamentoFatura()
    {
        return $this->diaFechamentoFatura;
    }

    /**
     * @param int $diaFechamentoFatura
     */
    public function setDiaFechamentoFatura($diaFechamentoFatura)
    {
        $this->diaFechamentoFatura = $diaFechamentoFatura;
    }

    /**
     * @return int
     */
    public function getDiaVencimentoFatura()
    {
        return $this->diaVencimentoFatura;
    }

    /**
     * @param int $diaVencimentoFatura
     */
    public function setDiaVencimentoFatura($diaVencimentoFatura)
    {
        $this->diaVencimentoFatura = $diaVencimentoFatura;
    }

    /**
     * @return float
     */
    public function getLimite()
    {
        return $this->limite;
    }

    /**
     * @param float $limite
     */
    public function setLimite($limite)
    {
        $this->limite = $limite;
    }

    /**
     * @return boolean
     */
    public function isAtivo()
    {
        return $this->ativo;
    }

    /**
     * @param boolean $ativo
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
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


}

