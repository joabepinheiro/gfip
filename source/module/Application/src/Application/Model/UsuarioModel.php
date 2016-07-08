<?php
namespace Application\Model;

use Application\Entity\Usuario;
use Doctrine\ORM\EntityManager;
use Zend\Hydrator\ClassMethods;
use Zend\Session\Container;
use Zend\Stdlib\Hydrator;

class UsuarioModel extends AbstractModel  {

    public function __construct(EntityManager $em){
        parent::__construct($em);
        $this->entity = 'Application\Entity\Usuario';
    }

}