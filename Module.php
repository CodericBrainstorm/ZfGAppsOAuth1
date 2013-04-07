<?php
namespace GAppsOAuth1;

use Reservas\Model\Localizador;
use Reservas\Model\LocalizadorTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{
        // Add this method:
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
		'GAppsOAuth1\Model\GAppsOAuth1Storage' => function($sm){
		    return new \GAppsOAuth1\Model\GAppsOAuth1Storage('GAppsOAuth1');  
		},
            ),
        );
    }
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                    'Auth' => __DIR__ . '/../../vendor/Auth',
                ),
                'prefixes' => array( 
                    'Auth' => __DIR__ . '/../../vendor/Auth',
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}