<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class Modules extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:module {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create module CLI';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        if(File::exists(base_path('Modules/'.$name))){
            $this->error('Module already exists !');
        }else{
            File::makeDirectory(base_path('modules/'.$name,0775,true,true));

            //config
            $configFolder=base_path('modules/'.$name.'/configs');
            if(!File::exists($configFolder)){
                File::makeDirectory($configFolder,0775,true,true);
            }
            //helper
            $helperFolder=base_path('modules/'.$name.'/helpers');
            if(!File::exists($helperFolder)){
                File::makeDirectory($helperFolder,0775,true,true);
            }
            //migrations
            $migrationFolder=base_path('modules/'.$name.'/migrations');
            if(!File::exists($migrationFolder)){
                File::makeDirectory($migrationFolder,0775,true,true);
            }
            //resources
            $resourceFolder=base_path('modules/'.$name.'/resources');
            if(!File::exists($resourceFolder)){
                File::makeDirectory($resourceFolder,0775,true,true);
                //languages
                $languageFolder=base_path('modules/'.$name.'/resources/lang');
                if(!File::exists($languageFolder)){
                    File::makeDirectory($languageFolder,0775,true,true);
                }
                // views
                $viewFolder=base_path('modules/'.$name.'/resources/views');
                if(!File::exists($viewFolder)){
                    File::makeDirectory($viewFolder,0775,true,true);

                }


            }
            //routes
            $routeFolder=base_path('modules/'.$name.'/routes');
            if(!File::exists($routeFolder)){
                File::makeDirectory($routeFolder,0775,true,true);
                //tạo file routes.php
                $routeFile= base_path('modules/'.$name.'/routes/routes.php');
                if(!File::exists($routeFile)){
                    File::put($routeFile,"<?php \n use Illuminate\Support\Facades\Route;");
                }
            }
            //src
            $srcFolder=base_path('modules/'.$name.'/src');
            if(!File::exists($srcFolder)){
                File::makeDirectory($srcFolder,0775,true,true);
                //commands
                $commandFolder=base_path('modules/'.$name.'/src/Commands');
                if(!File::exists($commandFolder)){
                    File::makeDirectory($commandFolder,0775,true,true);
                }
                //Http
                $httpFolder=base_path('modules/'.$name.'/src/Http');
                if(!File::exists($httpFolder)){
                    File::makeDirectory($httpFolder,0775,true,true);

                    //Controllers
                    $controllerFolder=base_path('modules/'.$name.'/src/Http/Controllers');
                    if(!File::exists($controllerFolder)){
                        File::makeDirectory($controllerFolder,0775,true,true);
                    }
                    //Middlewares
                    $middlewareFolder=base_path('modules/'.$name.'/src/Http/Middlewares');
                    if(!File::exists($middlewareFolder)){
                        File::makeDirectory($middlewareFolder,0775,true,true);
                    }
                }
                //Models
                $modelFolder=base_path('modules/'.$name.'/src/Models');
                if(!File::exists($modelFolder)){
                    File::makeDirectory($modelFolder,0775,true,true);
                }


            }



            $this->info('Module created successfully !');
        }

    }
}
