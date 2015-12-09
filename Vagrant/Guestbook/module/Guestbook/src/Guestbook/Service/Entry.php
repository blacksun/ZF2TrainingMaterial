<?php
namespace Guestbook\Service;

use Guestbook\Table\Entry as EntryTable;

class Entry
{
    /**
     * @var EntryTable
     */    
    private $entryTable;
    
    public function setEntryTable($entryTable)
    {
        $this->entryTable = $entryTable;
    }
    
    public function getEntryTable()
    {
        return $this->entryTable;
    }
    
    public function getLasts()
    {
        return $this->getEntryTable()->findAll();
    }
}