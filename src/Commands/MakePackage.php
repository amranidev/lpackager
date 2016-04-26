<?php

namespace Amranidev\Lpackager\Commands;

use Illuminate\Console\Command;

class MakePackage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:package 
                            {package : Package name} 
                            {path : Package path}
                            {namespace : Package namespace}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new package';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $package = ucfirst($this->argument('package'));

        $path = $this->argument('path');
        
        $namespace = $this->argument('namespace');
        
        $root = base_path() .'/'. $path .'/'.$package;

        $this->comment($root);

        $resources = $root . '/resources/views';

        $database = $root . '/database/migrations';

        $src = $root . '/src/Http/Controllers';

        $controllerNameSpace = $namespace . "/Http/Controllers";
        
        mkdir($root);

        $this->comment($root . " Created");
        
        mkdir($resources, 0777, true);
        
        $this->comment($root . " Created");
        
        mkdir($database, 0777, true);
        
        $this->comment($root . " Created");
        
        mkdir($src, 0777, true);
        
        $this->comment($root . " Created");
        $controllerNameSpace = str_replace('/', '\\', $controllerNameSpace);
        file_put_contents($root . '/src/Http/routes.php', "<?php\n".view('lpackager::routes', compact('controllerNameSpace', 'package'))->render());
        $this->comment($root . "Routes Created");
        $controllerNameSpace = str_replace('/', '\\', $controllerNameSpace);
        
        file_put_contents($root . '/src/Http/Controllers/WelcomeController.php', "<?php\n".view('lpackager::WelcomeController', compact('controllerNameSpace', 'package'))->render());
        $this->comment($root . "Controller Created");
        $namespace = str_replace('/', '\\', $namespace);
        
        file_put_contents($root . '/src/' . $package . 'ServiceProvider.php', "<?php\n".view('lpackager::ServiceProvider', compact('package', 'namespace'))->render());
        $this->comment($root . "provider Created");
        file_put_contents($root . '/resources/views/welcome.blade.php', view('lpackager::welcome')->render());
        $this->comment($root . "view Created");
    }
}
