<?php
namespace Guestbook\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Guestbook\Service\Entry;

class EntryServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceManager)
    {
        $entryService = new Entry();
        $entryService->setEntryTable($serviceManager->get('entry_table'));
        
        return $entryService;
    }
}