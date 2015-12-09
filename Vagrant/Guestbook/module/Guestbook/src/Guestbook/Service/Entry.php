<?php
namespace Guestbook\Service;

use Guestbook\Table\Entry as EntryTable;

class Entry
{
    private $serviceManager;
    
    public function setServiceManager($serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }
    
    public function getServiceManager()
    {
        return $this->serviceManager;
    }
    
    private $entryTable;
    
    public function setEntryTable($entryTable)
    {
        $this->entryTable = $entryTable;
    }
    
    public function getEntryTable()
    {
        return $this->entryTable;
    }
    
    public function get()
    {
        $entry = new \stdClass();
        $entry->message = "Ceci n'est pas un message";
        $entry->author = "Gabriele Santini";
        $entry->date = "May 14, 2012";
        
        return $entry;
    }
    
    public function getLasts()
    {
//         $entryTable = $this->getServiceManager()->get('entry_table');
        
        return $this->getEntryTable()->findAll();
    }
}