<?php
namespace Guestbook\Service;

class Entry
{
    public function getLasts()
    {
        $entries = [];
        
        $entry = new \stdClass();
        $entry->message = "Ceci n'est pas un message";
        $entry->date = "May 15, 2012";
        $entry->author = 'Gabriele Santini';
        $entries[] = $entry;
        $entries[] = $entry;
        $entries[] = $entry;
        
        return $entries;
    }
}