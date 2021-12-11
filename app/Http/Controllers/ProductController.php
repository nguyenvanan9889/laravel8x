<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Voucher\Contract\VoucherInterface;
class ProductController extends Controller
{
    public function __construct(VoucherInterface $voucher)
    {
        echo '<pre>'; var_dump($voucher); die(); echo '</pre>';
    }
}
