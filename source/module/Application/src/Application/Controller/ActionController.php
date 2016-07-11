<?php
namespace Application\Controller;
use Base\Controller;
use Base\Service\SessionService;

/** @var  $em \Doctrine\ORM\EntityManager */

class ActionController extends Controller\ActionController{

    public function __construct(){
        parent::__construct();
    }
    public function desabilitarAction(){

    }

    public function getClienteLogado(){
        return $this->getEm()->getRepository('Application\Entity\Cliente')->find((new SessionService())->getIdClienteLogado());
    }
}