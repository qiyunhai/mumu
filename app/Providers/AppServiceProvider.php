<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\Admin\Node as NodeModel;

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
        View()->share('admin_node_list', NodeModel::get_node_list_view());
    }
}
