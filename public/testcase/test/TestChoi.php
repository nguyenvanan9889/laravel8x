<?php
require __DIR__.'/../../../vendor/autoload.php';
require __DIR__.'/../Calculator.php';
class TestChoi extends \PHPUnit\Framework\TestCase
{
	public function testTi1()
	{
		// Xác nhận $foo là true
		$foo = true;
		$this->assertTrue($foo);
	}
	public function testTi2()
	{
		// Xác nhận $foo là false
		$foo = false;
		$this->assertFalse($foo);
	}
	public function testTi3()
	{
		// Xác nhận $foo là true
		$foo = false;
		$this->assertTrue($foo);
	}
}