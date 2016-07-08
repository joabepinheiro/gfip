<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Hydrator\ClassMethods;
use Zend\Crypt\Key\Derivation\Pbkdf2;
/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Application\Entity\UsuarioRepository")
 */
class Usuario
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
     * @ORM\Column(name="nome", type="string", length=100, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="senha", type="string", length=45, nullable=false)
     */
    private $senha;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cadastrado_em", type="datetime", nullable=false)
     */
    private $cadastradoEm = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ultimo_acesso", type="datetime", nullable=false)
     */
    private $ultimoAcesso = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", nullable=false)
     */
    private $tipo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ativo", type="boolean", nullable=false)
     */
    private $ativo = '1';

    private $hash = 'jm8NY81CiHA=edhdvFRy14g54sGFG';

    /**
     * @var \Application\Entity\Cliente
     * @ORM\OneToOne(targetEntity="\Application\Entity\Cliente", mappedBy="usuario",  inversedBy="clientes")
     */
    private $cliente;

    public function __construct(array $options = array()){
        (new ClassMethods())->hydrate($options, $this);
        $this->cadastradoEm     = new \DateTime("now");
        $this->ultimoAcesso     = new \DateTime("now");
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getSenha()
    {
        return $this->senha;
    }


    public function setSenha($senha)
    {
        $this->senha =$this->encryptPassword($senha);
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCadastradoEm()
    {
        return $this->cadastradoEm;
    }

    /**
     * @param \DateTime $cadastradoEm
     */
    public function setCadastradoEm($cadastradoEm)
    {
        $this->cadastradoEm = $cadastradoEm;
    }

    /**
     * @return \DateTime
     */
    public function getUltimoAcesso()
    {
        return $this->ultimoAcesso;
    }

    /**
     * @param \DateTime $ultimoAcesso
     */
    public function setUltimoAcesso($ultimoAcesso)
    {
        $this->ultimoAcesso = $ultimoAcesso;
    }

    /**
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param string $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
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

    
    public function encryptPassword($password){
        return base64_encode(Pbkdf2::calc('sha256', $password, $this->hash, 10000, strlen($password*2)));
    }

    public function __toString(){
        return  $this->getNome();
    }
}

