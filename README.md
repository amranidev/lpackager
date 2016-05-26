## lpackager

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/5134089a-8f55-42af-baf6-e9a57a76b1b4/big.png)]
(https://insight.sensiolabs.com/projects/5134089a-8f55-42af-baf6-e9a57a76b1b4)

[![Build Status](https://travis-ci.org/amranidev/lpackager.svg?branch=master)](https://travis-ci.org/amranidev/lpackager)
[![StyleCI](https://styleci.io/repos/57151159/shield?style=flat)](https://styleci.io/repos/57151159)
[![Latest Stable Version](https://poser.pugx.org/amranidev/lpackager/v/stable)](https://packagist.org/packages/amranidev/lpackager) [![Latest Unstable Version](https://poser.pugx.org/amranidev/lpackager/v/unstable)](https://packagist.org/packages/amranidev/lpackager) [![License](https://poser.pugx.org/amranidev/lpackager/license)](https://packagist.org/packages/amranidev/lpackager)

Lpackager is small package that allows you to generate packages/moduls to your laravel app without forgetting business logic. [Split laravel app into pacakges/modules](http://amranidev.github.io/blog/site/split-your-laravel-app/)

### I. Package Installation

1. Run composer require to install Lpackager :
  
    ```
    composer require Amranidev/Lpackager:dev-master
  
    ```

    Or add in composer.json: 
    
    ```json
    require : {
        "laravel/framework": "5.2.*",
        "Amranidev/Lpackager": "v1.0.*"
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

### II. Quick Start
  
Create new package by `php artisan lpackager:package <PackageName> <PackagePath> <"NameSpace">`  

In this example we will create a new (package/module) into our application with a name (Customer)

  1. Create your first package:

      `php artisan lpackager:package Customer Kernel "Kernel\Customer"`

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

      Check if evreything is okey : 

      `http://{your-project-url}/Client` 

### III. Commands
      
* Create new Package : `php artisan lpackager:package <PackageName> <PackagePath> <"NameSpace">`
      
* Create new Controller : `php artisan lpackager:controller <Class> <PackageName> <PackagePath> <"NameSpace">`

* Create new Model : `php artisan lpackager:model <Class> <PackagePath> <"NameSpace">`
      
#### Contact : amranidev@gmail.com
