<?php
namespace Application\Model;

use Application\Entity\Usuario;
use Doctrine\ORM\EntityManager;
use Zend\Hydrator\ClassMethods;
use Zend\Session\Container;
use Zend\Stdlib\Hydrator;

class DespesaModel extends AbstractModel  {

    public function __construct(EntityManager $em){
        parent::__construct($em);
        $this->entity = 'Application\Entity\Despesa';
    }

    public function insert($data)
    {

        $data['categoria']  = $this->entityManager->getRepository('Application\Entity\Categoria')->find( $data['categoria']);
        $data['conta']      = $this->entityManager->getRepository('Application\Entity\Conta')->find( $data['conta']);
        $data['cliente']    = $this->getInstanceUsuarioLogado()->getCliente();
        
        if((new ContaModel($this->entityManager))->sacar($data['valor'], $data['conta'])){
            return parent::insert($data);
        }
        return null;
    }

    public function update($data){
        $data['categoria']  = $this->entityManager->getRepository('Application\Entity\Categoria')->find( $data['categoria']);
        $data['conta']      = $this->entityManager->getRepository('Application\Entity\Conta')->find( $data['conta']);
        $data['cliente']    = $this->getInstanceUsuarioLogado()->getCliente();

        $entity = $this->entityManager->getReference($this->entity, $data['id']);

        (new ClassMethods())->hydrate($data, $entity);

        $this->entityManager->persist($entity);
        $this->entityManager->flush();
        return $entity;
    }

}