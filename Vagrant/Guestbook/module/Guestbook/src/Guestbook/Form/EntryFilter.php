<?php
namespace Guestbook\Form;

use Zend\InputFilter\InputFilter;

class EntryFilter extends InputFilter
{
    public function __construct()
    {
        $this->add([
            'name'       => 'author',
            'required'   => true,
            'filters'    => [['name' => 'StringTrim']],
            'validators' => [[
                'name' => 'StringLength',
                'options' => [
                    'min' => 4,
                    'max' => 255
                ]
            ]]
        ]);
        
        $this->add([
            'name'       => 'email',
            'required'   => true,
            'filters'    => [['name' => 'StringTrim']],
            'validators' => [[
                'name' => 'EmailAddress',
            ]]
        ]);
    }
}