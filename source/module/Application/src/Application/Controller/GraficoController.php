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
use Zend\View\Model\ViewModel;

class GraficoController extends ActionController
{
    public function __construct()
    {

    }

    public function  indexAction(){
        return $this->redirect()->toRoute($this->route, array('action' => 'listar'));
    }

    public function cadastrarAction(){

    }

    public function editarAction(){

    }

    public function  listarAction(){


    }

    public function deletarAction(){

    }
}