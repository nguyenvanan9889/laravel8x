<?php
namespace App\Services\Logs;
use App\Services\Logs\LogInterface;
class Db implements LogInterface {
	public function show()
	{
		return 'Log to db';
	}
}