<?php

namespace App\Providers;

use App\Http\Abstraction\Classes\ProvidersClass;
use App\Http\Abstraction\Classes\UserResourceClass;
use App\Http\Abstraction\Classes\FilteringUserClass;
use App\Http\Abstraction\Factories\UsersDTOFactory;
use App\Http\Abstraction\Interfaces\FilteringUserInterface;
use App\Http\Abstraction\Interfaces\UsersRepositoryInterface;
use App\Http\Abstraction\Interfaces\UserResourceInterface;
use App\Http\Abstraction\Repositories\UsersRepository;
use Illuminate\Support\ServiceProvider;
use pcrov\JsonReader\JsonReader;

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
        $this->app->bind(UsersRepositoryInterface::class, function () {
            return new UsersRepository(new JsonReader(), new ProvidersClass(request()->get('provider')));
        });
        $this->app->bind(UserResourceInterface::class, function () {
            return new UserResourceClass();
        });
        $this->app->bind(FilteringUserInterface::class, function (){
            return new FilteringUserClass(
                UsersDTOFactory::create(array_keys(config('providers.providers'))[0], [])
            );
        });
    }
}
