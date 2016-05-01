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
        $generator->root();
        $this->comment("Root directory Successfully generated");
        
        //generate resources directory
        $generator->resources();
        $this->comment("Resources and views directory Successfully generated");
        
        //generate database directory
        $generator->database();
        $this->comment("Database directory Successfully generated");
        
        //generate config directory
        $generator->config();
        $this->comment("Config directory Successfully generated");
        
        //generate src directory
        $generator->src();
        $this->comment("Source directory Successfully generated");
        
        //generate Controller blade and routes
        $generator->generateFiles();

        $this->comment("(WelcomeController,welcome.blade,routes) Successfully generated");
        
        $this->comment("-----------------------------------------------");
        
        $this->comment("Done");
        
        $this->comment("-----------------------------------------------");
        
        $this->comment("Go a head and :");
        
        $this->comment("Add your package namespace to composer.json");
        
        $this->comment("Add your ServiceProvider to config/app.php");
    }
}
