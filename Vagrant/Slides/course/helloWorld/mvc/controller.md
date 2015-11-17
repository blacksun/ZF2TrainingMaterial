#Controller



##Action Controller 

In Zend Framework 2, the controller is a class that is generally called {Controller name}Controller

	!php
	class IndexController extends AbstractActionController

Each action is a public method within the controller class that is named {action name}Action

	!php
	public function indexAction()

