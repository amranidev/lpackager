
namespace {{$controllerNameSpace}};

use {{$package}}AppController as Controller;


class WelcomeController extends Controller
{

	public function index()
	{
	    $package = "{{$package}}";

		return view('{{$package}}::welcome' , compact('package'));
	}

}