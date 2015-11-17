# Module



## Get Configure

	!php
	public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
   
---

# Module



## Get Autoloader Configure

	!php
	public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
   