<?php
namespace Guestbook\Form;

use Zend\Form\Form;

class Entry extends Form
{
    public function __construct()
    {
        parent::__construct();
        
        $this->add([
            'type'       => 'text',
            'name'       => 'author',
            'options'    => ['label' => 'Author'],
        ]);
         
        $this->add([
            'type'       => 'email',
            'name'       => 'email',
            'options'    => ['label' => 'Email'],
        ]);
        
        $this->add([
            'type'       => 'textarea',
            'name'       => 'message',
            'options'    => ['label' => 'Message'],
        ]);
        $this->add([
            'type'       => 'text',
            'name'       => 'website',
            'options'    => ['label' => 'Website'],
        ]);
        
        $this->add([
            'type'       => 'submit',
            'name'       => 'submit',
            'attributes' => ['value' => 'Submit']
        ]);
        
        $this->setInputFilter(new EntryFilter());
    }
}