<?php
namespace Base\Controller;
use Base\Form\DeletarForm;

use Doctrine\Common\EventManager;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Zend\Form\Form;
use Zend\Http\Request;
use Zend\Mvc\Application;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\Controller\Plugin\FlashMessenger;
use Zend\Session\Container;
use zend\View\Model\ViewModel;

use Zend\Paginator\Paginator,
    Zend\Paginator\Adapter\ArrayAdapter;

/** @var  $em \Doctrine\ORM\EntityManager */

class ActionController extends AbstractActionController {

    protected $slug;
    protected $em;
    protected $model;
    protected $entity;
    protected $form;
    protected $formService = false;
    protected $route;
    protected $action;

    public function __construct() {
        if(!is_null($this->slug)){
            $this->entity       = ($this->entity)       ? $this->entity         : 'Application\\Entity\\'. ucfirst($this->slug);
            $this->model        = ($this->model)        ? $this->model          : 'Application\Model\\'. ucfirst($this->slug).'Model';
            $this->form         = ($this->form)         ? $this->form           : 'Application\Form\\'. ucfirst($this->slug).'Form';
            $this->formService  = ($this->formService)  ? $this->formService    : false;
            $this->route        = ($this->route)        ? $this->route          : $this->slug. '/default';
        }
    }

    public function  indexAction(){
        //return $this->redirect()->toRoute($this->route, array('action' => 'listar'));
    }

    public function cadastrarAction(){
        $form       = ($this->formService) ? $this->getServiceLocator()->get($this->form) : new $this->form();
        $form->get('submit')->setLabel('Cadastrar');
        $request    = $this->getRequest();

        if($request->isPost()) {
            $form->setData($request->getPost());
            if($form->isValid()) {
                $service = $this->getServiceLocator()->get($this->model);

                $entity = $service->insert($request->getPost()->toArray());

                $this->flashMessenger()
                    ->setNamespace(FlashMessenger::NAMESPACE_SUCCESS)
                    ->addMessage($entity . ' cadastrado com sucesso');

                $form       = ($this->formService) ? $this->getServiceLocator()->get($this->form) : new $this->form();
                $this->redirect()->toRoute($this->route);
            }
        }

        return new ViewModel(array(
            'form' => $form
        ));
    }

    public function editarAction(){
        $form    = ($this->formService) ? $this->getServiceLocator()->get($this->form) : new $this->form();
        $form->get('submit')->setLabel('Editar');
        $request = $this->getRequest();

        $repository = $this->getEm()->getRepository($this->entity);
        $entity = $repository->find($this->getPK());

        if(!$entity){
            return $this->redirect()->toRoute($this->route, array('action', 'listar'));
        }

        if($this->params()->fromRoute('id',0))
            $form->setData($entity->toArray());

        if($request->isPost()) {
            $form->setData($request->getPost());

            if($form->isValid()) {

                $service = $this->getServiceLocator()->get($this->model);
                $entity = $service->update($request->getPost()->toArray());

                $this->flashMessenger()
                    ->setNamespace(FlashMessenger::NAMESPACE_SUCCESS)
                    ->addMessage($entity. ' atualizado com sucesso');

                $this->redirect()->toRoute($this->route);
            }
        }

        return new ViewModel(array(
            'form' => $form,
            'entity' => $entity
        ));
    }

    public function  listarAction(){

        $list = $this->getEm()->getRepository($this->entity)->findAll();
        $page = $this->params()->fromRoute('page');

        /**
        $paginator = new Paginator(new ArrayAdapter($list));
        $paginator->setCurrentPageNumber($page)
            ->setDefaultItemCountPerPage(1);
         **/

        return new ViewModel(array(
            'data'          => $list,
            'page'          => $page,
        ));
    }

    public function deletarAction(){

        $this->layout()->setVariable('titulo', 'Deletar registro permanetemente');

        $form = new DeletarForm();
        $request = $this->getRequest();
        $id = $this->getPK();

        $row = $this->getEm()->getRepository($this->entity)->find(array('id'=> $id));


        //Se o registro a ser deletado existir popula o form deletar com ele
        if(!$row)
            return $this->redirect()->toRoute($this->route);
        else
            $form->setData($row->toArray());


        if($request->isPost()) {
            $data= $request->getPost();
            $form->setData($request->getPost());

            if($form->isValid() && $data['result'] === 'sim') {

                $this->flashMessenger()
                    ->setNamespace(FlashMessenger::NAMESPACE_ERROR)
                    ->addMessage($row. ' removido');

                $service = $this->getServiceLocator()->get($this->model);
                $service->delete(array('id'=> $id));

                return $this->redirect()->toRoute($this->route);
            }
            return $this->redirect()->toRoute($this->route);
        }

        return new ViewModel(array(
            'form'          => $form,
            'row'           => $row,
            'rote'          => $this->route,
        ));
    }

    public function deletarProibidoAction(){

        $this->layout()->setVariable('titulo', 'O registro não pode ser deletado ');

        $id = $this->getPK();
        $row = $this->getEm()->getRepository($this->entity)->find(array('id'=> $id));

        //Se o registro a ser deletado existir popula o form deletar com ele
        if(!$row)
            return $this->redirect()->toRoute($this->route);

        return new ViewModel(array(
            'row'           => $row,
            'rote'          => $this->route,
        ));
    }

    /**
     * Retorna uma instancia do EntityManager
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEm(){
        return $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    }

    /**
     * Retorna a chave primaria enviada pela requisição,
     * @param string $pk
     * @return mixed $id
     */
    protected function getPK($pk = 'id'){
        if(!is_null($this->getRequest()->getPost()[$pk]))
            return  $this->getRequest()->getPost()[$pk];
        return $this->params()->fromRoute($pk, 0);

    }
}