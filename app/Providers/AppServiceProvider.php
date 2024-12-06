<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Schema::defaultStringLength(191);

        Paginator::useBootstrap();

        Blade::directive('hasrole', function ($expression) {
            return "<?php if(auth('empleado')->check() && auth('empleado')->user()->hasRole({$expression})): ?>";
        });
    
        Blade::directive('endhasrole', function () {
            return '<?php endif; ?>';
        });

    }
}
