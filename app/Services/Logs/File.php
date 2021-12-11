<?php
namespace App\Services\Logs;
use App\Services\Logs\LogInterface;
class File implements LogInterface {
	public function show()
	{
		return 'Log to file';
	}
}