<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Application\Form\DespesaForm;
use Application\Form\ReceitaForm;
use Application\Form\TransferenciaForm;
use Application\Model\CartaoModel;
use Application\Model\CategoriaModel;
use Application\Model\ChamadoModel;
use Application\Model\ClienteModel;
use Application\Model\ConsultorModel;
use Application\Model\ContaModel;
use Application\Model\DespesaModel;
use Application\Model\InvestimentoModel;
use Application\Model\ReceitaModel;
use Application\Model\ReceitoModel;
use Application\Model\ReciboModel;
use Application\Model\TransferenciaModel;
use Application\Model\UsuarioModel;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Session\Container;
use Zend\Validator\AbstractValidator;
use Zend\Mvc\I18n\Translator;

class Module

{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        $services = $e->getApplication()->getServiceManager();
        $config = $services->get('config');
        $phpSettings = $config['php_settings'];
        if ($phpSettings) {
            foreach ($phpSettings as $key => $value) {
                ini_set($key, $value);
            }
        }

        //Pega o serviço translator definido no arquivo module.config.php (aliases)
        $translator = $e->getApplication ()->getServiceManager ()->get ( 'translator' );

        //Define o local onde se encontra o arquivo de tradução de mensagens
        $translator->addTranslationFile (
            'phpArray',
            __DIR__ . '/../../vendor/zendframework/zendframework/resources/languages/pt_BR/Zend_Validate.php',
            'default',
            'pt_BR'
        );

        //Define o local (você também pode definir diretamente no método acima
        $translator->setLocale ( 'pt_BR' );
        //Define a tradução padrão do Validator
        AbstractValidator::setDefaultTranslator ( new Translator($translator) );

        //Anexa o evento validaAuth no dispath

        $eventManager->attach(MvcEvent::EVENT_DISPATCH, array(
            $this,
            'validaAuth'
        ), 101);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }


    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig(){
        return array(
            'factories' => array(
                'Application\Model\ConsultorModel' => function($sm){
                    return new ConsultorModel($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Application\Model\CartaoModel' => function($sm){
                    return new CartaoModel($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Application\Model\CategoriaModel' => function($sm){
                    return new CategoriaModel($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Application\Model\ChamadoModel' => function($sm){
                    return new ChamadoModel($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Application\Model\ClienteModel' => function($sm){
                    return new ClienteModel($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Application\Model\ContaModel' => function($sm){
                    return new ContaModel($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Application\Model\DespesaModel' => function($sm){
                    return new DespesaModel($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Application\Model\InvestimentoModel' => function($sm){
                    return new InvestimentoModel($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Application\Model\ReceitaModel' => function($sm){
                    return new ReceitaModel($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Application\Model\ReciboModel' => function($sm){
                    return new ReciboModel($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Application\Model\TransferenciaModel' => function($sm){
                    return new TransferenciaModel($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Application\Model\UsuarioModel' => function($sm){
                    return new UsuarioModel($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Application\Form\ReceitaForm' => function($sm){
                    return new ReceitaForm(null, $sm->get('Doctrine\ORM\EntityManager'));
                },
                'Application\Form\DespesaForm' => function($sm){
                    return new DespesaForm(null, $sm->get('Doctrine\ORM\EntityManager'));
                },
                'Application\Form\TransferenciaForm' => function($sm){
                    return new TransferenciaForm(null, $sm->get('Doctrine\ORM\EntityManager'));
                },
                'navigation' => function($sm) {
                    $navigation = new \Zend\Navigation\Service\DefaultNavigationFactory();
                    $navigation = $navigation->createService($sm);

                    return $navigation;
                }
            )
        );
    }

    /**
     * @param $e
     * @return null
     */
    public function validaAuth($e){

        return true;
        $matches    = $e->getRouteMatch();
        $controller = $matches->getParam('controller');
        $action     = $matches->getParam('action');

        $container = new Container('logado');

        if(
            $controller == 'Application\Controller\Publico' ||
            $controller == 'Application\Controller\Auth'||
            $controller == 'Application\Controller\Index'
        ){
            return true;
        }


        if($container->offsetExists('usuario')){
            $tipoDeUsuario  = $container->offsetGet('usuario')['tipo'];

            $acl =  $e->getApplication()->getServiceManager()->get('Acl\Permissions\Acl');
            $result = $acl->isAllowed($tipoDeUsuario, $controller,$action)? true : false;

            if(!$result &&
                $controller != 'Application\Controller\Auth' &&
                $controller != 'Application\Controller\Index'
            ){

                return $this->toRoute($e, 'negado', 'auth');
            }
        }else{
            return $this->toRoute($e, 'login');
        }
    }

    public function toRoute(MvcEvent $e, $route, $action = null){
        $url = $e->getRouter()->assemble(array('action' => $action),
            array('name' => $route));

        $response = $e->getResponse();
        $response->getHeaders()->addHeaderLine('Location', $url);
        $response->setStatusCode(302);
        $response->sendHeaders();
        return null;
    }
}
