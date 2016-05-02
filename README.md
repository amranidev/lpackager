# lpackager

Lpackager is small package that allows you to generate packages/moduls to your laravel app without forgetting business logic.

###I. Package Installation

1. Run composer require to install Lpackager :
  
    ```
    composer require Amranidev/scaffold-interface:dev-master
  
    ```

    Or add in composer.json: 
    
    ```json
    require : {
        "laravel/framework": "5.1.*",
        "Amranidev/scaffold-interface": "dev-master"
    }
    ```
    
    Then update composer :
    
    ```
    $ composer update
    ```
    
  3. Add the service providers to config/app.php :

    ```php

    Amranidev\Lpackager\LpackagerServiceProvider::class,
  
    ```

###II. Quick start
  
Create new package by `php artisan make:package <PackageName> <Path> <"NameSpace">`  

In this example we will create a new (package/module) into our application with a name (Customer)

  1. Create your first package:

  	  `php artisan make:package Customer Kernel "Kernel\Customer"`

 		