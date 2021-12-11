<?php
class Singleton {
	private static $instance;
	private function __construct(){

	}
	public static function getInstance()
	{
		if (self::$instance != null) {
			return self::$instance;
		}
		return self::$instance = new self;
	}
	public function showName()
	{
		return __class__.' | '.__function__;
	}
}
echo '<pre>'; var_dump(Singleton::getInstance()->showName()); die(); echo '</pre>';