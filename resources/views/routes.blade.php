/*
 |-----------------------------------------------------
 | {{$package}} Routes
 |-----------------------------------------------------
 | 
 | Here is where {{$package}} package routes.
 | 
 */ 

Route::get('{{lcfirst($package)}}','\{{$controllerNameSpace}}\WelcomeController@index');