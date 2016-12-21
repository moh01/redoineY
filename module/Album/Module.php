<?php
namespace Album;


use Album\Model\FrtradeTable;

use Album\View\Helper\DisplayAvatar;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
				'Album\Model\FrtradeTable' =>  function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new FrtradeTable($dbAdapter);
                    return $table;
                },
               
            ),
            
        );
    }   

   
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

   
}