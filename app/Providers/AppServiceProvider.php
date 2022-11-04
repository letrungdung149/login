<?php

namespace App\Providers;

use App\Models\TodoList;
use App\Repositories\Elequent\TodoRepository;
use App\Repositories\TodoRepositoryInterface;
use App\Show\Facade\ShowFacade;
use App\Show\ShowManager;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Nette\Schema\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TodoRepositoryInterface::class, function(){
            return new TodoRepository(new TodoList());
        });
        $this->app->singleton('show',function(){
            return new ShowManager();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        \Illuminate\Support\Facades\Schema::defaultStringLength(191);
        $this->registerShow();
    }

    protected function registerShow(){
        ShowFacade::add('facades','facades');
    }
}
