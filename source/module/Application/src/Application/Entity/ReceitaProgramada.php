<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Hydrator\ClassMethods;
/**
 * ReceitaProgramada
 *
 * @ORM\Table(name="receita_programada", indexes={@ORM\Index(name="fk_receita_programada_conta1_idx", columns={"conta_id"}), @ORM\Index(name="fk_receita_programada_categoria1_idx", columns={"categoria_id"})})
 * @ORM\Entity
 */
class ReceitaProgramada
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
     * @var float
     *
     * @ORM\Column(name="valor", type="float", precision=10, scale=0, nullable=false)
     */
    private $valor;

    /**
     * @var string
     *
     * @ORM\Column(name="frequencia", type="string", nullable=false)
     */
    private $frequencia;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ativo", type="boolean", nullable=false)
     */
    private $ativo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="lembrete", type="boolean", nullable=false)
     */
    private $lembrete = '0';

    /**
     * @var \Application\Entity\Categoria
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Categoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categoria_id", referencedColumnName="id")
     * })
     */
    private $categoria;

    /**
     * @var \Application\Entity\Conta
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Conta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="conta_id", referencedColumnName="id")
     * })
     */
    private $conta;

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
     * @return string
     */
    public function getFrequencia()
    {
        return $this->frequencia;
    }

    /**
     * @param string $frequencia
     */
    public function setFrequencia($frequencia)
    {
        $this->frequencia = $frequencia;
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
     * @return boolean
     */
    public function isLembrete()
    {
        return $this->lembrete;
    }

    /**
     * @param boolean $lembrete
     */
    public function setLembrete($lembrete)
    {
        $this->lembrete = $lembrete;
    }

    /**
     * @return Categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param Categoria $categoria
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    /**
     * @return Conta
     */
    public function getConta()
    {
        return $this->conta;
    }

    /**
     * @param Conta $conta
     */
    public function setConta($conta)
    {
        $this->conta = $conta;
    }


}

