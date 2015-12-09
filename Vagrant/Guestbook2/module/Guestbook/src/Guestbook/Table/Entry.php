<?php
namespace Guestbook\Table;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class Entry extends TableGateway
{
    public function findAll()
    {
        return $this->select();
    }
    
    public function findLasts($limit = 5)
    {
        /** @var Select $select */
        $select = $this->getSql()->select();
        $select->limit($limit)
            ->order('date DESC');
        
        return $this->selectWith($select);
    }
}