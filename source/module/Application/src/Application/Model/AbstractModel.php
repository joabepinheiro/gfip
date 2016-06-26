<?php
namespace Application\Model;

use Doctrine\ORM\EntityManager;
use Zend\Hydrator\ClassMethods;
use Zend\Session\Container;
use Zend\Stdlib\Hydrator;

abstract class AbstractModel extends \Base\Model\AbstractModel {

    public function __construct($entityManager){
        parent::__construct($entityManager);
    }
}