<?php
namespace Guestbook\Service;

use Guestbook\Table\Entry as EntryTable;

class Entry
{
    /**
     * @var EntryTable
     */
    private $entryTable;

    /**
     * @param EntryTable $entryTable
     */
    public function setEntryTable(EntryTable $entryTable)
    {
        $this->entryTable = $entryTable;
    }
    
    /**
     * @return EntryTable
     */
    public function getEntryTable()
    {
        return $this->entryTable;
    }
    
    public function getLasts()
    {
        return $this->getEntryTable()->findLasts();
    }
}