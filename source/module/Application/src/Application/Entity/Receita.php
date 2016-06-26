<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Hydrator\ClassMethods;
/**
 * Receita
 *
 * @ORM\Table(name="receita", indexes={@ORM\Index(name="fk_table1_categoria1_idx", columns={"categoria_id"}), @ORM\Index(name="fk_Receitas_conta1_idx", columns={"conta_id"})})
 * @ORM\Entity
 */
class Receita
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
     * @var \DateTime
     *
     * @ORM\Column(name="data", type="date", nullable=false)
     */
    private $data;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=255, nullable=true)
     */
    private $descricao;

    /**
     * @var boolean
     *
     * @ORM\Column(name="fixa", type="boolean", nullable=false)
     */
    private $fixa = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="efetuada", type="boolean", nullable=false)
     */
    private $efetuada = '1';

    /**
     * @var \Application\Entity\Conta
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Conta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="conta_id", referencedColumnName="id")
     * })
     */
    private $conta;

    /**
     * @var \Application\Entity\Categoria
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Categoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categoria_id", referencedColumnName="id")
     * })
     */
    private $categoria;

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
     * @return \DateTime
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param \DateTime $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param string $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return boolean
     */
    public function isFixa()
    {
        return $this->fixa;
    }

    /**
     * @param boolean $fixa
     */
    public function setFixa($fixa)
    {
        $this->fixa = $fixa;
    }

    /**
     * @return boolean
     */
    public function isEfetuada()
    {
        return $this->efetuada;
    }

    /**
     * @param boolean $efetuada
     */
    public function setEfetuada($efetuada)
    {
        $this->efetuada = $efetuada;
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


}

