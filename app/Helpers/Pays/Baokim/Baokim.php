<?php
namespace App\Helpers\Pays\Baokim;
use App\Helpers\Pays\Contract\PayInterface;
class Baokim implements PayInterface {
	private $env;
	private $clientId;
	private $secretId;
	public function __construct()
	{
		$this->env = 'baokim_env';
		$this->clientId = 'client baokim';
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