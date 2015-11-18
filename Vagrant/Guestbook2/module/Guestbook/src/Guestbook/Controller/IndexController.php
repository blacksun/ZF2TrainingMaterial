<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Guestbook for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Guestbook\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Guestbook\Service\Entry;

class IndexController extends AbstractActionController
{
    /**
     * @var Entry
     */
    private $entryService;
    
    public function setEntryService(Entry $entryService)
    {
        $this->entryService = $entryService;
    }
    
    public function getEntryService()
    {
        return $this->entryService;
    }
    
    public function indexAction()
    {
//         $this->entryService = new Entry();
        return ['entries' => $this->getEntryService()->getLasts()];
    }
}
