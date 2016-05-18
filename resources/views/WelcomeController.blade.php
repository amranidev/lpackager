
namespace {{$controllerNameSpace}};

use {{$package}}AppController as Controller;


class WelcomeController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
	{
	    $package = "{{$package}}";

		return view('{{$package}}::welcome' , compact('package'));
	}
}
