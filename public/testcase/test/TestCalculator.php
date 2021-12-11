<?php
require __DIR__.'/../../../vendor/autoload.php';
require __DIR__.'/../Calculator.php';
class TestCalculator extends \PHPUnit\Framework\TestCase
{
	// Method này sẽ cung cấp nhiều loại input từ đó ta không phải tạo nhiều method test như testPlus, testMinus, ... mà chỉ cần tạo duy nhất 1 method test.
	// Output của nó nên là kết quả thực tế trả về của 1 method và kết quả mong đợi của method đó
	public function provideTestCalculator()
	{
		return [
			[3, (new Calculator(1, 2))->plus()],
			[5, (new Calculator(10, 5))->minus()],
		];
	}
	/**
	 * Method này nên chỉ chứa code assert (xác nhận) mà không được chưa code logic tới các method cần test.
	 * @dataProvider provideTestCalculator
	 */
	public function testCalculator($expected, $result)
	{
		$this->assertEquals($expected, $result);
		// $this->assertTrue($expected == $result);
	}
}