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
            'type'       => 'text',
            'name'       => 'message',
            'options'    => ['label' => 'Message'],
        ]);
        $this->add([
            'type'       => 'submit',
            'name'       => 'submit',
            'attributes' => ['value' => 'Submit']
        ]);
    }
}
