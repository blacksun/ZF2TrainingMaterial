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
use Guestbook\Service\Entry as EntryService;
use Guestbook\Form\Entry as EntryForm;

class IndexController extends AbstractActionController
{
    /**
     * @var EntryService
     */
    private $entryService;
    
    /**
     * @var EntryForm
     */
    private $entryForm;
    
    public function setEntryForm($entryForm)
    {
        $this->entryForm = $entryForm;
    }
    
    public function getEntryForm()
    {
        return $this->entryForm;
    }
    
    public function setEntryService($entryService)
    {
        $this->entryService = $entryService;
    }
    
    public function getEntryService()
    {
        return $this->entryService;
    }
    
    public function indexAction()
    {
        return ['entries' => $this->getEntryService()->getLasts()];
    }
    
    public function entryAction()
    {
        $entryForm = $this->getEntryForm();
        $request = $this->getRequest();
        if ($request->isPost()) {
        
            $entryForm->setData($request->getPost());
            if ($entryForm->isValid()) {
                $data = $entryForm->getData();
                unset($data['submit']);
                $this->getEntryService()->add($data); 
                return $this->redirect()->toRoute('guestbook');
            }
        }
        
        return ['entryForm' => $entryForm];
    }
}
