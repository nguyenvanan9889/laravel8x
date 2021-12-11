<?php
namespace App\Services\Payment\Contract;
interface PaymentInterface {
	public function createRequest();
	public function listenNotify();
}