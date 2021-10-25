<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usterkimodel;
use App\Models\Notatki;
use App\Notifications\NewEntry;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
class UsterkiController extends Controller
{

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
    
    // auth()->user()->notify(new usterkimodel());

	return redirect('/payin')->with('success', 'Pomyślnie dodano nowy wpis!');
    }

	function ShowData($id_usterki)
    {
        $usterki=usterkimodel::find($id_usterki);
        return view('edit',['usterki'=>$usterki]);
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
        $usterkimodel->private=$req->private;
		$usterkimodel->status=$req->status;
        $usterkimodel->save();
        return redirect('/report')->with('success', 'Pomyślnie edytowano wpis!');
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
}