<?php

namespace Amranidev\Lpackager\Commands;

use Amranidev\Lpackager\FileSystem\Path;
use Amranidev\Lpackager\Generator\Generator;
use Illuminate\Console\Command;

/**
 * class MakePackage
 *
 * @package lpackager
 * @author Amrani Houssain <amranidev@gmail.com>
 */
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
        $path = new Path($this->argument('path'), $this->argument('package'));

        $generator = new Generator($path, $this->argument('namespace'));

        //generate root directory

        $this->comment($generator->root());
        
        //generate resources directory

        $this->comment($generator->resources());
        
        //generate database directory

        $this->comment($generator->database());
        
        //generate config directory

        $this->comment($generator->config());
        
        //generate src directory

        $this->comment($generator->src());
        
        //generate WelcomeController
        $this->comment($generator->generateWelcomeController());
        //generate ServiceProvider
        $this->comment($generator->generateServiceProvider());
        //generate WelcomeView
        $this->comment($generator->generateView());
        //generate config file
        $this->comment($generator->generateConfig());
        //generate routes file
        $this->comment($generator->generateRoute());

        $this->comment("-----------------------------------------------");
        
        $this->comment("------------------ Done -----------------------");
        
        $this->comment("-----------------------------------------------");
        
        $this->comment("Go a head and :");
        
        $this->comment("Add your package namespace to composer.json");
        
        $this->comment("Add your ServiceProvider to config/app.php");
    }
}
