<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 在模板端可直接使用 @json() 方法对数据进行json_encode()
        Blade::directive('json', function($data){
           return "<?php echo json_encode({$data}); ?>";
        });
    }
}
