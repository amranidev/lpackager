
/*
 |-------------------------------------------------------------------------
 | "{{$package}}" config for scaffolding
 |-------------------------------------------------------------------------
 |
 | You can replace this conf file with config/amranidev/config.php
 | to let scaffold-interface interact with "{{$package}}".
 |
 */
return [
		
		'package' => '{{$package}}',
	   
		'model' => base_path() . '/{{$path}}/{{$package}}/src',

        'views' => base_path() . '/{{$path}}/{{$package}}/resources/views',
        
        'controller' => base_path() . '/{{$path}}/{{$package}}/src/Http/Controllers',

        'migration' => base_path() . '/{{$path}}/{{$package}}/database/migrations',
		
		'database' => '/{{$path}}/{{$package}}/database/migrations',
	   	
	   	'routes' => base_path() . '/{{$path}}/{{$package}}/src/Http/routes.php',

	   	'controllerNameSpace' => '{{$namespace}}\\Http\\Controllers',

	   	'modelNameSpace' => '{{$namespace}}',
		
		'loadViews' => '{{$package}}',

	   ];
