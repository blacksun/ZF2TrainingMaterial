<?php
namespace Guestbook\Service;

class Entry
{
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
        $entries = [];
        $entry = new \stdClass();
        $entry->message = "Ceci n'est pas un message";
        $entry->author = "Gabriele Santini";
        $entry->date = "May 14, 2012";
        
        $entries[] = $entry;
 
        $entry = new \stdClass();
        $entry->message = "Bof";
        $entry->author = "Titi Toto";
        $entry->date = "May 13, 2012";
        
        $entries[] = $entry;
        
        $entry = new \stdClass();
        $entry->message = "Ceci est bien un message";
        $entry->author = "Gabriele Santini";
        $entry->date = "May 12, 2012";
        
        $entries[] = $entry;
        
        return $entries;
    }
}