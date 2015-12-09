<?php
namespace Guestbook\Factory;

use Zend\ServiceManager\FactoryInterface;
use Guestbook\Controller\IndexController;
use Zend\ServiceManager\ServiceLocatorInterface;
use Guestbook\Service\Entry;

class IndexControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $controllerManager)
    {
        $controller = new IndexController();
        $serviceManager = $controllerManager->getServiceLocator();
        $entryService = $serviceManager->get('entry_service');
        $controller->setEntryService($entryService);
        
        return $controller;
    }
}