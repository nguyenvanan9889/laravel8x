<?php
interface Bank {
	public function getBankName();
}
class TpBank implements Bank {
	public function getBankName() {
		return 'TpBank';
	}
}
class VietcomBank implements Bank {
	public function getBankName() {
		return 'VietcomBank';
	}
}
class bankType {
	const TPBANK = 'tpbank';
	const VIETCOMBANK = 'vietcombank';
}
class BankFactory {
	public static function getBank($type)
	{
		switch($type){
			case bankType::TPBANK:
				return new TpBank;
			case bankType::VIETCOMBANK:
				return new VietcomBank;
			default:
				throw new Exception("This bank type unsupport");
		}
	}
}
$bank = BankFactory::getBank(bankType::VIETCOMBANK);
echo '<pre>'; var_dump($bank); die(); echo '</pre>';
// bài toán client chọn phương thức thanh toán sẽ dùng design pattern này. Eg:
// 1. client click chọn thanh toán qua bảo kim or vnpay khi đó login sẽ rẽ nhánh và khởi tạo object thanh toán mà client đã chọn.
// 2. client click chọn phương thức vận chuyển là giao hàng nhanh or giao hàng tiết kiệm khi đó login sẽ rẽ nhánh và khởi tạo object vận chuyển mà client đã chọn.