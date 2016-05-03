## lpackager

Lpackager is small package that allows you to generate packages/moduls to your laravel app without forgetting business logic.

###I. Package Installation

1. Run composer require to install Lpackager :
  
    ```
    composer require Amranidev/Lpackager:dev-master
  
    ```

    Or add in composer.json: 
    
    ```json
    require : {
        "laravel/framework": "5.1.*",
        "Amranidev/Lpackager": "dev-master"
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

 	  ![Imgur](http://i.imgur.com/iRR8pF6.png)

  2. Register namespace:
     
     Add to composer.json

     ```json
        "psr-4": {
            "App\\": "app/",
            "Kernel\\Customer\\": "Kernel/Customer/src"
        }
     ```
  3. Register the service provider:

     Add the service provider to config/app.php
        
     ```php
     Kernel\Customer\CustomerServiceProvider::class,
     ```
  4. Finally:
       
      Run `composer dump-autoload`

      Visit your package `http://{your-project}/customer`