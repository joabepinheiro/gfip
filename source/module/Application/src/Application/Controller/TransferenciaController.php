<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\Controller\Plugin\FlashMessenger;
use Zend\View\Model\ViewModel;

class TransferenciaController extends ActionController
{

    public function __construct()
    {
        $this->slug = 'transferencia';
        $this->formService  = true;
        parent::__construct();
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

                if($entity ==-1){
                    $this->flashMessenger()
                        ->setNamespace(FlashMessenger::NAMESPACE_ERROR)
                        ->addMessage('A conta de origem não contêm saldo suficiente');
                }else{
                    $this->flashMessenger()
                        ->setNamespace(FlashMessenger::NAMESPACE_SUCCESS)
                        ->addMessage('transferência feita com sucesso');
                }

                $form       = ($this->formService) ? $this->getServiceLocator()->get($this->form) : new $this->form();
                $this->redirect()->toRoute($this->route);
            }
        }

        return new ViewModel(array(
            'form' => $form
        ));
    }

    public function  listarAction(){
        $list = $this->getEm()->getRepository($this->entity)->findBy(array(
            'cliente' => $this->getClienteLogado()
        ));

        return new ViewModel(array(
            'data'          => $list,
        ));
    }
}
