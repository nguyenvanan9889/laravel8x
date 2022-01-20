<?php
namespace Annv\Demo\Providers;
use Illuminate\Support\ServiceProvider;
class DemoServiceProvider extends ServiceProvider {
	public function register()
    {
        /**
         * mergeConfigFrom đẩy vào global config 1 array có key = tham số thứ 2 và
         * value = array trong file có đường dẫn là tham số thứ 1
         * ví dụ bên dưới global config sẽ có thêm 1 key config('annv-demo') = value của
         * file annv-demo.php, chú ý rằng config trong root config sẽ override
         * annv-demo.php nếu chúng trùng key cho nên nên publish file config của package
         * ra root config kết hợp với method này để người dùng package có thể override
         * config này
         */
 		$this->mergeConfigFrom(
            __DIR__.'/../../config/annv-demo.php', 'annv-demo'
        );
    }
	public function boot()
    {
    	$this->loadViewsFrom(__DIR__.'/../../resources/views/', 'annv-demo');
        /**
         * php artisan vendor:publish --tag=annv-demo-config
         */
        $this->publishes([
            __DIR__.'/../../config/annv-demo.php' => config_path('annv-demo.php'),
        ], 'annv-demo-config');
    }
}
