<?php
namespace App\Helpers\Dbs\Mysql;
use App\Helpers\Dbs\Contract\DbInterface;
class Mysql implements DbInterface {
	public function connect()
	{
		return 'Mysql';
	}
}