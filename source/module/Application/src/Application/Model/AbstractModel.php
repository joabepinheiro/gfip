<?php
namespace Application\Model;

use Application\Entity\Usuario;
use Base\Service\SessionService;
use Doctrine\ORM\EntityManager;
use Zend\Hydrator\ClassMethods;
use Zend\Session\Container;
use Zend\Stdlib\Hydrator;

abstract class AbstractModel extends \Base\Model\AbstractModel {

    public function __construct($entityManager){
        parent::__construct($entityManager);
    }

    /**
     * @return Usuario
     */
    public function getInstanceUsuarioLogado(){
        $id = (new SessionService())->getIdUsuarioLogado();
        return $this->entityManager->getRepository('Application\Entity\Usuario')->find($id);
    }
}