<?php
namespace Guestbook\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Guestbook\Form\Entry as EntryForm;
use Guestbook\Form\EntryFilter;

class EntryFormFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceManager)
    {
        $entryForm = new EntryForm();
        $entryForm->setInputFilter(new EntryFilter());
        
        return $entryForm;
    }
}