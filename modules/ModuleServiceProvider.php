<?php

namespace Modules;




use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // $dir = File::directories(__DIR__);
        $directories = array_map('basename', File::directories(__DIR__));
        // dd($directories);
        if (!empty($directories)) {
            foreach ($directories as $directory) {
                $this->registerModule($directory);
            }
        }
    }
    public function registerModule($module)
    {
        $modulePath = __DIR__ . "/{$module}";
        // echo $modulePath.'<br/>';
        //Khai báo routes
        if (File::exists($modulePath . '/routes/route.php')) {

            $this->loadRoutesFrom($modulePath . '/routes/route.php');
        }

        //Khai báo migrations
        if (File::exists($modulePath . '/migrations')) {

            $this->loadMigrationsFrom($modulePath . '/migrations');
        }

        //Khai báo languages
        if (File::exists($modulePath . '/resources/lang')) {

            $this->loadTranslationsFrom($modulePath . '/resources/lang', $module);
            $this->loadJsonTranslationsFrom($modulePath . '/resources/lang');
        }
        //Khai báo views
        if (File::exists($modulePath . '/resources/views')) {

            $this->loadViewsFrom($modulePath . '/resources/views', $module);
        }
        //Khai báo helpers
        if (File::exists($modulePath . '/helpers')) {

            $helperList = File::allFiles($modulePath . '/helpers');
            if (!empty($helperList)) {
                foreach ($helperList as $helper) {
                    $file = $helper->getPathName();
                    require $file;
                }
            }
        }
    }
    public function register()
    {
        //Khai báo config

        $directories = array_map('basename', File::directories(__DIR__));

        if (!empty($directories)) {
            foreach ($directories as $directory) {
               $configPath =__DIR__.'/'.$directory.'\configs';

               if (File::exists($configPath)) {

                $configFiles = array_map('basename',File::allFiles($configPath));
                foreach ($configFiles as $config  ) {
                    $alias = basename($config,'.php');
                    $this->mergeConfigFrom($configPath.'/'.$config,$alias);
                }
               }
            }
        }
    }
}
