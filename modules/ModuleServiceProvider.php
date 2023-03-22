<?php
namespace Modules;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Modules\User\src\Commands\TestCommand;
use Modules\User\src\Http\Middlewares\DemoMiddleware;

class ModuleServiceProvider extends ServiceProvider
{

    public function boot(){
        // $dir=File::directories(__DIR__);//lay folder hien tai
        //thong qua array_map lay basename
        $directories=array_map('basename',File::directories(__DIR__));
        if(!empty($directories)){
            //neu ton tai folder trong module
            foreach($directories as $directory)
            {
                $this->registerModule($directory);
            }
        }
    }
    public function registerModule($module){
        $modulePath=__DIR__.'/'.$module;
        //khai bao cac thanh phan
        // dd($modulePath);

        //khai bao routes
        // dd(File::exists($modulePath. '/migrations'));
        if(File::exists($modulePath.'/routes/routes.php')){
            $this->loadRoutesFrom($modulePath.'/routes/routes.php');
        }
        //khai bao migrations
        if(File::exists($modulePath. '/migrations')){
            $this->loadMigrationsFrom($modulePath.'/migrations');
        }
        //khai bao languages

        if(File::exists($modulePath. '/resources/lang')){
            // $this->loadTranslationsFrom($modulePath.'/resources/lang',$module);// file php
            $this->loadJsonTranslationsFrom($modulePath.'/resources/lang');
        }
        // khai bao view
        if(File::exists($modulePath. '/resources/views')){
            $this->loadViewsFrom($modulePath. '/resources/views',$module);
        }
        // khai bao helpers

        if(File::exists($modulePath. '/helpers'))
        {
            //tat ca file helpers
            $helperList=File::allFiles($modulePath.'/helpers');
            if(!empty($helperList))
            {
                foreach($helperList as $helper){
                    $file=$helper->getPathname();
                    require $file;
                }
            }
        }
    }
    public function register()
    {
        $directories=array_map('basename',File::directories(__DIR__));

        //Configs
        if(!empty($directories)){
            //neu ton tai folder trong module
            foreach($directories as $directory)
            {
                $configPath=__DIR__.'/'.$directory.'/configs';
                if(File::exists($configPath)){
                    $configFiles=array_map('basename',File::allFiles($configPath));
                    foreach($configFiles as $config){
                        $alias=basename($config,'.php');
                        $this->mergeConfigFrom($configPath.'/'.$config,$alias);
                    }
                }
            }
        }

        // Middlaware

        $middlewares=[
            'demo'=> DemoMiddleware::class,
        ];
        if(!empty($middlewares))
        {
            foreach($middlewares as $key => $middleware)
            {
                $this->app['router']->pushMiddlewareToGroup($key,$middleware);
            }
        }


        // Commands

        $this->commands([
            TestCommand::class,
        ]);

    }
}
