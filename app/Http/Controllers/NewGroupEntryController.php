<?php

namespace App\Http\Controllers;
use App\Models\Groups;
use App\Models\usterkimodel;
use Illuminate\Http\Request;
use App\Models\Departments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Notatki;
use Carbon\Carbon;
use App\Notifications\NewUsterkiNotification;
use App\User;

class NewGroupEntryController extends Controller
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
        $grupy=DB::table('grupy')
        ->join('group_members', 'grupy.id', '=', 'group_id')
        ->groupBy('grupy.id') 
         ->join('users', 'user_id', '=', 'users.id')
         ->where('department_id', $department_id)
         ->select('grupy.id','group_desc')
         ->selectRaw('GROUP_CONCAT(users.name) as "Członkowie"')
         ->get();
         $grupy->transform(function($i){
         return (array)$i;
         });
         $array = $grupy->toArray();
        return view('newgroupentry', ['grupa' => $grupy, 'departments'=>$Departments])->with('success', 'Pomyślnie dodano nowy prywatny wpis!');
    }

    function save(Request $req)
    {
	$this->validate($req, [
	    'tresc'=>'required',
	    'autor'=>'required',
		'deadline'=>'required',
        'otherValue'=>'required'
	]);
	$usterkimodel= new usterkimodel;
	$usterkimodel->place=$req->place;
	$usterkimodel->data=$req->data;
    $usterkimodel->id_autora=$req->id_autora;
	$usterkimodel->deadline=$req->deadline;
    if ($req->deadline == 'Wybierz z kalendarza' )
    {
        $usterkimodel->deadline=$req->datapozniej;
    }
    if ($req->deadline == 'Nieokreślona' )
    {
        $usterkimodel->deadline=null;
    }
	$usterkimodel->tresc=$req->tresc;
	$usterkimodel->autor=$req->autor;
    $usterkimodel->status=$req->status;
    $usterkimodel->private=$req->private;
    $usterkimodel->group_desc=$req->otherValue;
    $usterkimodel->group_id=$req->someOtherValue;
    $usterkimodel->importance=$req->importance;
    $usterkimodel->department_id=$req->department_id;
    $usterkimodel->save();

    if($req->tresc_nt !== null)
    {
    $Notatki=new Notatki;
    $Notatki->tresc_nt=$req->tresc_nt;
    $Notatki->id_usterki=$usterkimodel->id_usterki;
    $Notatki->autor=$req->autor;
    $usterkimodel->notki=$req->notki;
    $todayDate = Carbon::now('Europe/Warsaw');
    $Notatki->created_at=$todayDate;
    $Notatki->save();
    $usterkimodel->save();
    }

    $currentuser=auth()->user()->id;
    $department_id=Auth::user()->department_id;
    $user=  User::find(auth()->user()->id)
        ->where('department_id', $department_id)
        ->where('id', '!=', $currentuser)
        ->get();
        foreach($user as $user)
        {
            $user->notify(new NewUsterkiNotification($usterkimodel));
        }

	return redirect('/newgroupentry')->with('success', 'Pomyślnie dodano nowy wpis!');
    }
}
