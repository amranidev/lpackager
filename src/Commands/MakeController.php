<?php

namespace Amranidev\Lpackager\Commands;

use Amranidev\Lpackager\FileSystem\Filesystem;
use Illuminate\Console\Command;

class MakeController extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lpackager:controller
                            {class : ClassName}
                            {package : Package Name} 
                            {path : Package Path} 
                            {namespace : Package NameSpace}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new controller class for a package';

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

        $nameSpace = $this->argument('namespace') . '\\Http\\Controllers';

        $package = $this->argument('package');

        $className = $this->argument('class');

        $packagePath = $this->argument('path') . '/src/Http/Controllers/' . $className. '.php';

        $fileSystem->make($packagePath, "<?php\n\n".view('lpackager::GeneratorCommands.controller',
                                        compact('package', 'className', 'nameSpace'))->render());

        $this->comment('Done');
    }
}
