<?php
namespace Base\Model;

use Doctrine\ORM\EntityManager;
use Zend\Hydrator\ClassMethods;
use Zend\Session\Container;
use Zend\Stdlib\Hydrator;

abstract class AbstractModel {

    protected $entityManager;
    protected $entity;

    public function __construct(EntityManager $entityManager){
        $this->entityManager = $entityManager;
    }

    public function insert($data){

        $entity = null;

        if(is_array($data)){
            $entity = new $this->entity($data);
        }elseif(is_object($data)){
            $entity = $data;
        }
        
        $this->entityManager->persist($entity);
        $this->entityManager->flush();


        return $entity;
    }

    public function update($data){

        $entity = $this->entityManager->getReference($this->entity, $data['id']);

        (new ClassMethods())->hydrate($data, $entity);

        $this->entityManager->persist($entity);
        $this->entityManager->flush();
        return $entity;
    }

    public function delete($id){

        $entity = $this->entityManager->getReference($this->entity, $id);

        if($entity){
            $this->entityManager->remove($entity);
            $this->entityManager->flush();
            return $id;
        }
        return null;
    }

    public function redirectHome(){
        $container = new Container('logado');


        //Se existir alguem logado
        if($container->offsetExists('usuario')){
            $url = '/index/';

            $tipo = $container->offsetGet('usuario')['tipo'];
            if($tipo == 'consultor')
               $url = '/consultor/index';

            if($tipo == 'cliente')
                $url = '/cliente/index';

            if($tipo == 'administrador')
                $url = '/administrador/index';

            header("Location: ". $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST']. $url);
            return NULL;
        }
    }
}