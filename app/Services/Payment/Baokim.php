<?php
namespace App\Services\Payment;
use App\Services\Payment\Contract\PaymentInterface;
class Baokim implements PaymentInterface {
	protected $client;
	protected $secret;
	protected $returnUrl;
	public function __construct()
	{
		$this->client = 'sdfjlksdjfklsdjlk';
		$this->secret = 'ksladhglaskhgsk';
		$this->returnUrl = route('home').'/baokim-return';
	}
	public function config($client, $secret, $returnUrl){
		$this->client = $client;
		$this->secret = $secret;
		$this->returnUrl = $returnUrl;
	}
	public function createRequest(){
		return 'https://baokim.vn';
	}
	public function listenNotify(){

	}
}