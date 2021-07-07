<?php

namespace App\Http\Controllers;
use App\Models\Groups;
use App\Models\usterkimodel;
use Illuminate\Http\Request;
use App\Models\Departments;
use Illuminate\Support\Facades\Auth;

class NewPrivateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $department_id=Auth::user()->department_id;
        $Departments = new Departments;
        $Departments = Departments::where('id', $department_id)
        ->get();
        $groups = groups::all();
        return view('newprivate', ['grupa' => $groups, 'departments'=>$Departments])->with('success', 'Pomyślnie dodano nowy prywatny wpis!');
    }

    function save(Request $req)
    {
	$this->validate($req, [
	    'tresc'=>'required',
	    'autor'=>'required',
		'deadline'=>'required'
	]);
	$usterkimodel= new usterkimodel;
	$usterkimodel->place=$req->place;
	$usterkimodel->data=$req->data;
    $usterkimodel->id_autora=$req->id_autora;
	$usterkimodel->deadline=$req->deadline;
    if ($req->deadline == 'Później' )
    {
        $usterkimodel->deadline=$req->datapozniej;
    }
	$usterkimodel->tresc=$req->tresc;
	$usterkimodel->autor=$req->autor;
    $usterkimodel->status=$req->status;
    $usterkimodel->private=$req->private;
    $usterkimodel->group_desc=$req->group_desc;
    $usterkimodel->importance=$req->importance;
    $usterkimodel->department_id=$req->department_id;
	$usterkimodel->save();
	return redirect('/newprivate')->with('success', 'Pomyślnie dodano nowy wpis!');
    }
}
