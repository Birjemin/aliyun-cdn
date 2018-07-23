<?php
/**
 * Created by PhpStorm.
 * User: birjemin
 * Date: 23/07/2018
 * Time: 17:39
 */
namespace Birjemin\AliyunCdn;


use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

/**
 * Class ServiceProvider
 * @package Birjemin\AliyunCdn
 */
class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Boot the provider.
     */
    public function boot()
    {

    }

    /**
     * Setup the config.
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__.'/../config/aliyun-cdn.php');
        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('aliyun-cdn.php')], 'aliyun-cdn');
        }
        $this->mergeConfigFrom($source, 'aliyun-cdn');
    }

    /**
     * Register the provider.
     */
    public function register()
    {
        $this->setupConfig();
    }

    /**
     * @return mixed
     */
    protected function getRouter()
    {
        return $this->app->router;
    }
}
