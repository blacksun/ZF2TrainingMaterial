<?php
namespace Guestbook\Factory;

use Zend\ServiceManager\FactoryInterface;
use Guestbook\Controller\IndexController;
use Zend\ServiceManager\ServiceLocatorInterface;

class IndexControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $controllerManager)
    {
        $controller = new IndexController();
        $serviceManager = $controllerManager->getServiceLocator();
        $controller->setEntryService($serviceManager->get('entry_service'));
        $controller->setEntryForm($serviceManager->get('entry_form'));
        return $controller;
    }
}