<?php

namespace App\Providers;

use App\Exceptions\NotAcceptableRestException;
use App\Models\Channel;
use Carbon\CarbonTimeZone;
use Exception;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
        });

        Route::model('channels', Channel::class);
        //Route::model('programes', 'Programme');

        Route::bind('date', function ($value) {
            try {
                $date = new Carbon($value);
            } catch (Exception $e) {
                throw new NotAcceptableRestException($e->getMessage(), 422);
            }

            if ($date->format('Y-m-d') != $value || !$date->isValid()) {
                throw new NotAcceptableRestException('Unacceptable date format.', 422);
            }

            return $date;
        });

        Route::bind('timeZone', function ($value) {
            try {
                $tz = CarbonTimeZone::instance($value);

            } catch (Exception $e) {
                throw new NotAcceptableRestException($e->getMessage(), 422);
            }

            if (!$tz) {
                throw new NotAcceptableRestException('Unacceptable timezone', 422);
            }
            return $tz;
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60);
        });
    }
}
