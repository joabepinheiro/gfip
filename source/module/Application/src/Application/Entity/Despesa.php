<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Hydrator\ClassMethods;
/**
 * Despesa
 *
 * @ORM\Table(name="despesa", indexes={@ORM\Index(name="fk_Despesa_categoria1_idx", columns={"categoria_id"}), @ORM\Index(name="fk_Despesa_conta1_idx", columns={"conta_id"}), @ORM\Index(name="fk_Despesa_cartao1_idx", columns={"cartao_id"})})
 * @ORM\Entity
 */
class Despesa
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
     * @ORM\Column(name="valor", type="string", length=45, nullable=false)
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
     * @var \Application\Entity\Cartao
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Cartao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cartao_id", referencedColumnName="id")
     * })
     */
    private $cartao;

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
     * @return string
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param string $valor
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
     * @return Cartao
     */
    public function getCartao()
    {
        return $this->cartao;
    }

    /**
     * @param Cartao $cartao
     */
    public function setCartao($cartao)
    {
        $this->cartao = $cartao;
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

