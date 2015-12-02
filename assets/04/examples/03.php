<?php

class BasicClass {
	
	static $staticVariable;
	
	public function __construct($name) {
		self::$staticVariable = $name;
	}
	
	public static function staticFunction($ohai) {
		echo $ohai . '<br />' . PHP_EOL;
	}

}

BasicClass::staticFunction('O Hi');

$inst = new BasicClass('foo');
$inst2 = new BasicClass('bar');

echo BasicClass::$staticVariable . '<br />' . PHP_EOL;
echo BasicClass::$staticVariable . '<br />' . PHP_EOL;