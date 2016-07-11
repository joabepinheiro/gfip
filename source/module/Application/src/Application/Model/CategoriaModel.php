<?php
namespace Application\Model;

use Application\Entity\Usuario;
use Doctrine\ORM\EntityManager;
use Zend\Hydrator\ClassMethods;
use Zend\Session\Container;
use Zend\Stdlib\Hydrator;

class CategoriaModel extends AbstractModel  {

    public function __construct(EntityManager $em){
        parent::__construct($em);
        $this->entity = 'Application\Entity\Categoria';
    }

    public function insert($data)
    {
        $data['cliente']    = $this->getInstanceUsuarioLogado()->getCliente();
        return parent::insert($data);
    }
    
}