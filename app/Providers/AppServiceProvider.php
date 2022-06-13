<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Festival;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Schema;

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
        //
        if (Schema::hasTable('festivals')) {
            $festivals = Festival::all();
            if($festivals != null)
            {
                $festival = Festival::find(1)->first();
                view()->share('festival' , $festival);
            }
            
        }
    }
}
