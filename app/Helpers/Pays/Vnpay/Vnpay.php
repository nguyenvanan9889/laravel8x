<?php
namespace App\Helpers\Pays\Vnpay;
use App\Helpers\Pays\Contract\PayInterface;
class Vnpay implements PayInterface {
	public function __construct()
	{
		$this->env = 'vnpay_env';
		$this->clientId = 'client vnpay';
		$this->secretId = 'secret vnpay';
	}
	public function setEnv($env)
	{
		$this->env = $env;
	}
	public function setClientId($clientId)
	{
		$this->clientId = $clientId;
	}
	public function setSecretId($secretId)
	{
		$this->secretId = $secretId;
	}
	public function getUrl(){
		return __class__.' | '.__method__;
	}
	public function checkSignature(){
		return __class__.' | '.__method__;
	}
	public function return(){
		return __class__.' | '.__method__;
	}
	public function webhook(){
		return __class__.' | '.__method__;
	}
}