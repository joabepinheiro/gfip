<?php
namespace Base\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Console\Application;
use Zend\ServiceManager\ServiceManager;
use Zend\Session\Container;
use Zend\Stdlib\Hydrator;

 class SessionService {

    protected  $session;

    public function __construct(){
         $this->session = new Container('session');
    }

     /**
      * Retorna o tipo do usuario logado
      * @return string
     */
     public function getTipoUsuario(){
         if($this->session->offsetExists('usuario')){
             return $this->session->offsetGet('usuario')['tipo'];
         }
         return null;
     }

     public function getIdUsuarioLogado(){
         return $this->getUsuarioLogado()['id'];
     }

     public function isLogado(){
         if($this->session->offsetExists('usuario')){
             return true;
         }
         return false;
     }

     public function getUsuarioLogado(){
         return $this->session->offsetGet('usuario');
     }

 }