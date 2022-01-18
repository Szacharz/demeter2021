<?php

namespace App\Http\Controllers;

use App\Notifications\NewUsterkiNotification;
use Illuminate\Http\Request;
use App\Models\usterkimodel;
use App\Models\Notatki;
use App\Notifications\NewEntry;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\User;
use App\Models\Departments;
use App\Models\images;
class UsterkiController extends Controller
{

   public function save(Request $req)
    {
	$this->validate($req, [
	    'tresc'=>'required',
	    'autor'=>'required',
		'deadline'=>'required',
        // 'photo'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'  
	]);
	$usterkimodel= new usterkimodel;
	$usterkimodel->place=$req->place;
	$usterkimodel->data=$req->data;
    $usterkimodel->id_autora=$req->id_autora;
	$usterkimodel->deadline=$req->deadline;
    $usterkimodel->tresc=$req->tresc;
    if ($req->deadline == 'Wybierz z kalendarza' )
    {
        $usterkimodel->deadline=$req->datapozniej;
    }
    if ($req->deadline == 'Nieokreślona' )
    {
        $usterkimodel->deadline=null;
    }
	$usterkimodel->autor=$req->autor;
    $usterkimodel->status=$req->status;
    $usterkimodel->private=$req->private;
    $usterkimodel->group_desc=$req->otherValue;
    $usterkimodel->group_id=$req->someOtherValue;
    $usterkimodel->importance=$req->importance;
    $usterkimodel->department_id=$req->department_id;
    $usterkimodel->save();

    $department_id=Auth::user()->department_id;
    // $notice= DB::table("users")
    // ->where("department_id", $department_id)
    // ->get();
    // Notification::send($notice, new NewUsterkiNotification());
    $currentuser=auth()->user()->id;
    if  ($req->private == 0)
    {
        $user=  User::find(auth()->user()->id)
        ->where('department_id', $department_id)
        ->where('id', '!=', $currentuser)
        ->get();
        foreach($user as $user)
        {
            $user->notify(new NewUsterkiNotification($usterkimodel));
        }
    }
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
    // if($req->hasFile('photo'))
    //     {
    //     $images=new images;
    //     $images->img_code = base64_encode(file_get_contents($req->file('photo'))); 
    //     $tanotatka=DB::table('notatki')
    //     ->where('tresc_nt', '=', $req->tresc_nt)
    //     ->where('autor', '=', $req->autor)
    //     ->where('id_usterki', '=',$usterkimodel->id_usterki)
    //     ->orderBy('created_at')
    //     ->first();

    //     $images->id_usterki=$usterkimodel->id_usterki;
    //     $images->id_notatki=$tanotatka->id_notatki;
    //     $images->save();

    //     $idtejnotatki= $tanotatka->id_notatki;    

    //     notatki::where('id_notatki', $idtejnotatki)->update(['img_code'=>base64_encode(file_get_contents($req->file('photo')))]);
    //     }
    }
    
    
    // auth()->user()->notify(new usterkimodel());

	return redirect('/payin')->with('success', 'Pomyślnie dodano nowy wpis!');
    }

	function ShowData($id_usterki)
    {
        $usterki=usterkimodel::find($id_usterki);
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
        return view('edit',['usterki'=>$usterki, 'grupa' => $grupy, 'departments'=>$Departments]);
    }
    function edit(Request $req)
    { 
        $usterkimodel= usterkimodel::find($req->input('id_usterki'));
        $usterkimodel->place=$req->place;
        $usterkimodel->data=$req->data;
        $usterkimodel->tresc=$req->tresc;
        $usterkimodel->autor=$req->autor;
		$usterkimodel->deadline=$req->deadline;
        if ($req->deadline == 'Później' )
        {
            $usterkimodel->deadline=$req->datapozniej;
        }
        if ($req->deadline == 'Nieokreślona' )
        {
            $usterkimodel->deadline=null;
        }
        $usterkimodel->private=$req->private;
		$usterkimodel->status=$req->status;

        if($req->otherValue != null)
        {
        $usterkimodel->group_desc=$req->otherValue;
        $usterkimodel->group_id=$req->someOtherValue;
        }

        $answer = $_POST['inlineRadioOptions'];  
        if ($answer == "null") 
        {          
            $usterkimodel->group_desc=null;
            $usterkimodel->group_id=null;  
        }
        $current_date_time = Carbon::now()->toDateTimeString();
        $user_name=Auth::user()->name;
        $usterkimodel->updated_at=$current_date_time;
        $usterkimodel->updated_by=$user_name;
        $usterkimodel->save();

       



        // return dd($req->otherValue);
         return back()->with('success', 'Pomyślnie edytowano wpis!');
    }


    function Change($id_usterki)
    {  
        $todayDate = Carbon::now('Europe/Warsaw')->format('Y-m-d');
        $user_name=Auth::user()->name;
        $usterkimodel=usterkimodel::find($id_usterki);
        $usterki=usterkimodel::where('id_usterki', $id_usterki)->update(array('status'=> "Wykonane"));
        $usterki=usterkimodel::where('id_usterki', $id_usterki)->update(array('finisher'=> $user_name));
        $usterki=usterkimodel::where('id_usterki', $id_usterki)->update(array('finished_at'=>$todayDate));
        return redirect('/report')->with('success', 'Pomyślnie zakończono wpis!');
    }

    function Back($id_usterki)
    {  
        $todayDate = Carbon::now('Europe/Warsaw')->format('Y-m-d');
        $daybeforeyesterday = date("Y-m-d",strtotime($todayDate."-2 days")); 
        $user_name=Auth::user()->name;
        $usterkimodel=usterkimodel::find($id_usterki);
        $finished_at=$usterkimodel->finished_at;
        if($finished_at > $daybeforeyesterday)
             {
               $usterki=usterkimodel::where('id_usterki', $id_usterki)->update(array('status'=> "Niewykonane"));
               $usterki=usterkimodel::where('id_usterki', $id_usterki)->update(array('finisher'=> ""));
               $usterki=usterkimodel::where('id_usterki', $id_usterki)->update(array('finished_at'=>""));
               return redirect('/reporthis')->with('success', 'Pomyślnie cofnięto wpis!');
             }
        else
             {
            return redirect('/reporthis')->with('failure', 'Wpis nie został cofnięty. Wpis został zakończony dalej niż dwa dni temu.');
             }  
    }


    function Delete($id_usterki)
    {
        $usterkimodel= usterkimodel::find($id_usterki);
        $Notatki= Notatki::find($id_usterki);
        $Notatki->delete();
        $usterkimodel->delete();
        return redirect('/payout');

    }
    function markAsRead()
    {  
        $user=  User::find(auth()->user()->id);
        $user->notifications()->delete();
        return back();
    }
}