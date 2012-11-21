<?php

namespace BwfTagcloud;


class Module
{

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php'
            )
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'bwfTagcloudTable' => function ($sm)
                {
                    $config = $sm->get('Config');
                    
                    return new \Zend\Db\TableGateway\TableGateway(
                        $config['db']['prefix'] . 'bwf_tagcloud', 
                        $sm->get('Zend\Db\Adapter\Adapter'));
                },                
                'bwfTagcloudAggregateTable' => function ($sm)
                {
                    $config = $sm->get('Config');
                    
                    return new \Zend\Db\TableGateway\TableGateway(
                        $config['db']['prefix'] . 'bwf_tagcloud_aggregate', 
                        $sm->get('Zend\Db\Adapter\Adapter'));
                },                 
                'bwfTagcloudDataProvider' => function ($sm)
                {
                    $config = $sm->get('Config');
                    
                    return new \BwfTagcloud\Model\DataProvider(
                        $sm->get('bwfTagcloudTable'),
                        $config['db']['prefix']);
                
                }
            )
        );
    }

    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                'bwfTagcloudResources' => function ($sm)
                {
                    return new \BwfTagcloud\View\AppendResources();
                }, 
                'bwfTagcloudRenderer' => function ($sm)
                {
                    $data_provider = $sm->getServiceLocator()
                        ->get('bwfTagcloudDataProvider');
                    $data = $data_provider->getData();
                    
                    return new \BwfTagcloud\View\Renderer($data);
                }
            )
        );
    }

}

