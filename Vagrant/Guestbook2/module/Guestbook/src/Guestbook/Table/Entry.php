<?php
namespace Guestbook\Table;

use Zend\Db\TableGateway\TableGateway;

class Entry extends TableGateway
{
    public function findAll()
    {
        return $this->select();
    }
}