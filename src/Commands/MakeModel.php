<?php

namespace Amranidev\Lpackager\Commands;

use Illuminate\Console\Command;
use Amranidev\Lpackager\FileSystem\Filesystem;

class MakeModel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lpackager:model
                            {class : ClassName} 
                            {path : Package Path} 
                            {namespace : Package NameSpace}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new model class for a package';

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
        $fileSystem = new Filesystem();

        $nameSpace = $this->argument('namespace');

        $className = $this->argument('class');

        $packagePath = base_path().'/'.$this->argument('path').'/src/'.$className.'.php';

        $fileSystem->make($packagePath, "<?php\n\n".view('lpackager::GeneratorCommands.model',
                                        compact('className', 'nameSpace'))->render());

        $this->comment($packagePath.' created successfully');
    }
}
