<?php
namespace App\Helpers\Dbs\Mongodb;
use App\Helpers\Dbs\Contract\DbInterface;
class Mongodb implements DbInterface {
	public function connect()
	{
		return 'Mongodb';
	}
}