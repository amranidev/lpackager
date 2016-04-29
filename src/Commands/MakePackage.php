<?php

namespace Amranidev\Lpackager\Commands;

use Amranidev\Lpackager\FileSystem\Path;
use Amranidev\Lpackager\Generator\Generator;
use Illuminate\Console\Command;

class MakePackage extends Command
{

    /**
     *  @var $path
     */
    private $path;

    /**
     *  @var generator
     */
    private $generator;

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
        
        $generator->root();

        $this->comment("Root generated Successfully");
        
        $generator->resources();
        $this->comment("Resources and views Successfully generated");
        
        $generator->database();
        $this->comment("Database Successfully generated");
        
        $generator->config();
        $this->comment("Config Successfully generated");
        
        $generator->src();
        $this->comment("Source Successfully generated");
        
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
