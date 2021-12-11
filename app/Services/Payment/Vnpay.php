<?php
namespace App\Services\Payment;
use App\Services\Payment\Contract\PaymentInterface;
class Vnpay implements PaymentInterface {
	protected $client;
	protected $secret;
	protected $returnUrl;
	public function __construct()
	{
		$this->client = 'sdfjlksdjfklsdjlk';
		$this->secret = 'ksladhglaskhgsk';
		$this->returnUrl = route('home').'/vnpay-return';
	}
	public function config($client, $secret, $returnUrl){
		$this->client = $client;
		$this->secret = $secret;
		$this->returnUrl = $returnUrl;
	}
	public function createRequest(){
		return 'https://vnpay.vn';
	}
	public function listenNotify(){
		
	}
}