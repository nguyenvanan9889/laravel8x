<?php
namespace App\Helpers\Pays\Contract;
interface PayInterface {
	public function getUrl();
	public function checkSignature();
	public function return();
	public function webhook();
}