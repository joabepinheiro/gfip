<?php
namespace Application\Auth;

use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result;
use Doctrine\ORM\EntityManager;

class Adapter implements AdapterInterface{
    protected $em;
    protected $username;
    protected $password;

    function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function authenticate(){
        /** @var $repository \Application\Entity\UsuarioRepository*/
        $repository = $this->em->getRepository('Application\Entity\Usuario');
        $usuario    = $repository->findByEmailSenha($this->getUsername(), $this->getPassword());
        /** @var $usuario \Application\Entity\Usuario*/
        if($usuario){
            if($usuario->isAtivo()){
                return new Result(Result::SUCCESS, $usuario, array());
            }
            return new Result(Result::FAILURE_CREDENTIAL_INVALID, null, array('A sua conta não está habilitada, para habilita-la acesse a mensagem enviada para o email informado em seu cadastro'));

        }
        return new Result(Result::FAILURE_CREDENTIAL_INVALID, null, array('O email ou senha estão incorretos'));
    }

    /**
     * @param EntityManager $em
     */
    public function setEm($em)
    {
        $this->em = $em;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
}