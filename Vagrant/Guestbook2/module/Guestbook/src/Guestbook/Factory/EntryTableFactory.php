<?php
namespace Guestbook\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Guestbook\Table\Entry as EntryTable;

class EntryTableFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceManager)
    {
        $dbAdapter = $serviceManager->get('Zend\Db\Adapter\Adapter');
        $entryTable = new EntryTable('entry', $dbAdapter);
       
        return $entryTable;
    }
}