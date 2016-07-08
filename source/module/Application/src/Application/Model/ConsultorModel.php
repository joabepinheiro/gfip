<?php
namespace Application\Model;

use Application\Entity\Usuario;
use Doctrine\ORM\EntityManager;
use Zend\Hydrator\ClassMethods;
use Zend\Session\Container;
use Zend\Stdlib\Hydrator;

class ConsultorModel extends AbstractModel  {

    public function __construct(EntityManager $em){
        parent::__construct($em);
        $this->entity = 'Application\Entity\Consultor';
    }

    public function insert($data){
        $data['tipo'] = 'consultor';
        $data['usuario'] = (new UsuarioModel($this->entityManager))->insert($data);
        
       return parent::insert($data);
    }

}