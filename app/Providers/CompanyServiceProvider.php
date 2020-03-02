<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\Api\Company\CompanyController;
use App\Repo\Company\CompanyInterface;
use App\Repo\Company\CompanyRepository;
class CompanyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->when(CompanyController::class)
        ->needs(CompanyInterface::class)
        ->give(CompanyRepository::class);
    }
}
