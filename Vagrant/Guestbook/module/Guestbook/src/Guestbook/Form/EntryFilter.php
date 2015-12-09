<?php
namespace Guestbook\Form;

use Zend\InputFilter\InputFilter;
class EntryFilter extends InputFilter
{
    function __construct()
    {
        $this->add([
            'name' => 'author',
            'required'   => true,
            'filters'    => [['name' => 'StringTrim']],
            'validators' => [[
                'name' => 'StringLength',
                'options' => [
                    'min' => 4,
                    'max' => 40
                ]
            ]]
        ]);
        $this->add([
            'name' => 'email',
            'required'   => true,
            'filters'    => [['name' => 'StringTrim']],
            'validators' => [[
                'name' => 'EmailAddress'
                ]
            ]
        ]);
        $this->add([
            'name' => 'message',
            'required'   => true,
            'filters'    => [['name' => 'StringTrim']],
            'validators' => [[
                'name' => 'StringLength',
                'options' => [
                    'min' => 5,
                    'max' => 2000
                ]
            ]]
        ]);
        $this->add([
            'name' => 'website',
            'required'   => false,
            'filters'    => [['name' => 'StringTrim']],
            'validators' => [[
                'name' => 'Uri',
                'options' => [
                    'allowRelative' => false
                ]
            ]]
        ]);
    }
}