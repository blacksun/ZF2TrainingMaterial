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
        $entryService = $controllerManager->getServiceLocator()->get('entry_service');
        $controller->setEntryService($entryService);
        return $controller;
    }
}