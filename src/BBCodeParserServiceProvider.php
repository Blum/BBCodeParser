<?php namespace Golonka\BBCode;

use Illuminate\Support\ServiceProvider;

class BBCodeParserServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/bbcodeparser.php' => config_path('bbcodeparser.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        $this->mergeConfigFrom(
            __DIR__ . '/config/bbcodeparser.php', 'bbcodeparser'
        );

        $this->app->bind('bbcode', function () {
            return new BBCodeParser;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['bbcode'];
    }
}
