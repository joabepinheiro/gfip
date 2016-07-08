<?php
namespace Application\Model;

use Application\Entity\Usuario;
use Doctrine\ORM\EntityManager;
use Zend\Hydrator\ClassMethods;
use Zend\Session\Container;
use Zend\Stdlib\Hydrator;

class TransferenciaModel extends AbstractModel  {

    public function __construct(EntityManager $em){
        parent::__construct($em);
        $this->entity = 'Application\Entity\Transferencia';
    }


    public function insert($data)
    {
     
        $data['origem']      = $this->entityManager->getRepository('Application\Entity\Conta')->find( $data['origem']);
        $data['destino']      = $this->entityManager->getRepository('Application\Entity\Conta')->find( $data['destino']);
        $data['cliente']    = $this->getInstanceUsuarioLogado()->getCliente();
        
        $contaModel = new ContaModel($this->entityManager);
        $transferencia = $contaModel->transferir($data['origem'], $data['destino'], $data['valor']);

        if($transferencia == 1){
            $transferencia = parent::insert($data);
        }
        return $transferencia;
    }
}