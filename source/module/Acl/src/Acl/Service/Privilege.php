<?php

namespace Acl\Service;

use Base\Model\AbstractModel;
use Doctrine\ORM\EntityManager;
use Zend\Stdlib\Hydrator;

class Privilege extends AbstractModel
{
    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->entity = 'Acl\Entity\Privilege';
    }
    
    public function insert($data)
    {

        $entity = null;

        if($data['role'] == 'todos'){
            $roles = $this->entityManager->getRepository('Acl\Entity\Role')->findAll();

            foreach($roles as $role){
                $data['role'] = $role->getId();
                $entity = new $this->entity($data);

                $role = $this->entityManager->getReference('Acl\Entity\Role',$data['role']);
                $entity->setRole($role); // Injetando entidade carregada

                $resource = $this->entityManager->getReference('Acl\Entity\Resource',$data['resource']);
                $entity->setResource($resource); // Injetando entidade carregada

                $this->entityManager->persist($entity);
                $this->entityManager->flush();
            }
        }else{
            $entity = new $this->entity($data);

            $role = $this->entityManager->getReference('Acl\Entity\Role',$data['role']);
            $entity->setRole($role); // Injetando entidade carregada

            $resource = $this->entityManager->getReference('Acl\Entity\Resource',$data['resource']);
            $entity->setResource($resource); // Injetando entidade carregada

            $this->entityManager->persist($entity);
            $this->entityManager->flush();

        }

        return $entity;

    }
    
    public function update($data)
    {
        $entity = $this->entityManager->getReference($this->entity, $data['id']);
        (new Hydrator\ClassMethods())->hydrate($data, $entity);
        
        $role = $this->entityManager->getReference('Acl\Entity\Role',$data['role']);
        $entity->setRole($role); // Injetando entidade carregada
        
        $resource = $this->entityManager->getReference('Acl\Entity\Resource',$data['resource']);
        $entity->setResource($resource); // Injetando entidade carregada
        
        $this->entityManager->persist($entity);
        $this->entityManager->flush();
        return $entity;
    }
    
}
