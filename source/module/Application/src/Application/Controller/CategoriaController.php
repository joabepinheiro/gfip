<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Base\Service\SessionService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CategoriaController extends ActionController
{
    public function __construct()
    {
        $this->slug = 'categoria';
        parent::__construct();
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
