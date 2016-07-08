<?php
namespace Base\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Console\Application;
use Zend\ServiceManager\ServiceManager;
use Zend\Session\Container;
use Zend\Stdlib\Hydrator;

class ConfigService {

    public static function getRoute($name, $controller){
        return   array(
            'type'    => 'Literal',
            'options' => array(
                'route'    => '/'.$name,
                'defaults' => array(
                    '__NAMESPACE__' => 'Application\Controller',
                    'controller'    => $controller,
                    'action'        => 'listar',
                    'module'        => 'Application'
                ),
            ),
            'may_terminate' => true,
            'child_routes' => array(
                'default' => array(
                    'type'    => 'Segment',
                    'options' => array(
                        'route'    => '/[:action[/:id]]',
                        'constraints' => array(
                            'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            'id' => null
                        ),
                        'defaults' => array(
                            '__NAMESPACE__' => 'Application\Controller',
                            'controller'    => $controller,
                        )
                    ),
                ),
                'paginator' => array(
                    'type'    => 'Segment',
                    'options' => array(
                        'route'    => '/[:action/[page/:page]]',
                        'constraints' => array(
                            'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                        ),
                        'constraints' => array(
                            'page' => '\d+',
                        ),
                    ),
                )

            ),
        );
    }

}