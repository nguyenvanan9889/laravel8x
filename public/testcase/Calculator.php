<?php
class Calculator {
	public $a;
	public $b;
	public function __construct($a, $b)
	{
		$this->a = $a;
		$this->b = $b;
	}
	public function plus()
	{
		return $this->a + $this->b;
	}
	public function minus()
	{
		return $this->a - $this->b;
	}
}