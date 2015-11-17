#Namespaces

When you use classes from different libraries in your program, the class names may conflict.

To avoid that, before PHP 5.3, the only solution was to give very long names to classes prefixing them with contexts.


Namespaces allow to solve the name collisions between code components, and provide you with the ability to make the long names shorter.

---
#Namespaces

##Using aliases

It's possible to use the alias (short name for the class) with the help of PHP’s use statement:

	!php
	use Zend\Mvc\Controller\AbstractActionController;

Although the alias allows to use a short class name instead of the full name, its usage is optional. You are not required to always use aliases, and can refer the class by its full name.
