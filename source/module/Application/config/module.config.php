<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Base\Service\ConfigService;

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'application'       => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/application',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'login'             => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/login',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Auth',
                        'action'        => 'index',
                        'module'        => 'Application'
                    ),
                ),
            ),
            'logout'            => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/logout',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Auth',
                        'action'        => 'logout',
                        'module'        => 'Application'
                    ),
                ),
            ),
            'consultor'         => ConfigService::getRoute('consultor', 'Consultor'),
            'conta'             => ConfigService::getRoute('conta', 'Conta'),
            'receita'           => ConfigService::getRoute('receita', 'Receita'),
            'despesa'           => ConfigService::getRoute('despesa', 'Despesa'),
            'transferencia'     => ConfigService::getRoute('transferencia', 'Transferencia'),
            'cartao'            => ConfigService::getRoute('cartao', 'Cartao'),
            'grafico'           => ConfigService::getRoute('grafico', 'Grafico'),
            'categoria'         => ConfigService::getRoute('categoria', 'Categoria'),
            'investimento'      => ConfigService::getRoute('investimento', 'Investimento'),
            'cliente'           => ConfigService::getRoute('cliente', 'Cliente'),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'factories' => array(
            'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory',
        ),
    ),

    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Home',
                'route' => 'home',
                'pages' => array(
                    array(
                        'label'  => 'Consultor',
                        'route'  => 'consultor/default',
                        'pages'  => array(
                            array(
                                'label'  => 'Cadastrar',
                                'route'  => 'consultor/default',
                                'action' => 'cadastrar',
                            ),
                            array(
                                'label'  => 'Editar',
                                'route'  => 'consultor/default',
                                'action' => 'editar',
                            ),
                            array(
                                'label'  => 'Listar',
                                'route'  => 'consultor/default',
                                'action' => 'listar',
                            ),
                        )
                    ),
                    array(
                        'label'  => 'Receita',
                        'route'  => 'receita/default',
                        'pages'  => array(
                            array(
                                'label'  => 'Cadastrar',
                                'route'  => 'receita/default',
                                'action' => 'cadastrar',
                            ),
                            array(
                                'label'  => 'Editar',
                                'route'  => 'receita/default',
                                'action' => 'editar',
                            ),
                            array(
                                'label'  => 'Listar',
                                'route'  => 'receita/default',
                                'action' => 'listar',
                            ),
                        )
                    ),
                ),
            ),
        ),
    ),

    'translator' => array(
        'locale' => 'pt_BR',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => Controller\IndexController::class,
            'Application\Controller\Action' => Controller\ActionController::class,
            'Application\Controller\Administrador' => Controller\AdministradorController::class,
            'Application\Controller\Cartao' => Controller\CartaoController::class,
            'Application\Controller\Categoria' => Controller\CategoriaController::class,
            'Application\Controller\Chamado' => Controller\ChamadoController::class,
            'Application\Controller\Consultor' => Controller\ConsultorController::class,
            'Application\Controller\Conta' => Controller\ContaController::class,
            'Application\Controller\Despesa' => Controller\DespesaController::class,
            'Application\Controller\Investimento' => Controller\InvestimentoController::class,
            'Application\Controller\Recibo' => Controller\ReciboController::class,
            'Application\Controller\Transferencia' => Controller\TransferenciaController::class,
            'Application\Controller\Usuario' => Controller\UsuarioController::class,
            'Application\Controller\Auth' => Controller\AuthController::class,
            'Application\Controller\Receita' => Controller\ReceitaController::class,
            'Application\Controller\Cliente' => Controller\ClienteController::class,
            'Application\Controller\Grafico' => Controller\GraficoController::class,
        ),
    ),

    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'layout/documentacao'           => __DIR__ . '/../view/layout/layout-documentacao.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
            'partial/sidebar'             => __DIR__ . '/../view/partial/sidebar.phtml',
            'partial/administrador/sidebar'             => __DIR__ . '/../view/partial/administrador/sidebar.phtml',
            'partial/consultor/sidebar'             => __DIR__ . '/../view/partial/consultor/sidebar.phtml',
            'partial/cliente/sidebar'             => __DIR__ . '/../view/partial/cliente/sidebar.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),

    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        )
    ),
);


