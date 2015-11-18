<?php
namespace Guestbook\Service;

use Zend\ServiceManager\ServiceLocatorInterface;

class Entry
{
    /**
     * @var ServiceLocatorInterface
     */
    private $serviceManager;
    
    public function setServiceManager($serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }
    
    public function getServiceManager()
    {
        return $this->serviceManager;
    }
    
    public function getLasts()
    {
//         $entryTable = new Entry('guestbook_entry', $adapter);
        $entryTable = $this->getServiceManager()->get('entry_table');
        return $entryTable->findAll();
    }
}