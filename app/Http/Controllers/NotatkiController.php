<?php

namespace App\Http\Controllers;
use App\Models\Notatki;
use App\Models\usterkimodel;
use App\Models\Departments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\Notifications\NewUsterkiNotification;
use App\Notifications\NewNoteNotification;

class NotatkiController extends Controller
{   
	function appearData($id_usterki)
    {
        $department_id=Auth::user()->department_id;
        $Departments = new Departments;
        $Departments = Departments::where('id', $department_id)
        ->get();
        $usterki=usterkimodel::find($id_usterki);
        $Notatki=Notatki::find($id_usterki);
        $Notatki = Notatki::where('id_usterki', $id_usterki)
        ->get();
        return view('note',['usterki'=>$usterki, 'notatki'=>$Notatki, 'departments'=>$Departments]);
    }

	function save (Request $req)
    {   
        $this->validate($req, [
            'tresc_nt'=>'required'  
        ]);

        $user_name=Auth::user()->name;
        $usterkimodel= usterkimodel::find($req->input('id_usterki'));
        $Notatki=new Notatki;
        $Notatki->tresc_nt=$req->tresc_nt;
        $Notatki->id_usterki=$req->id_usterki;
        $Notatki->autor=$req->autor;
        $usterkimodel->notki=$req->notki;
        $todayDate = Carbon::now('Europe/Warsaw');
        $Notatki->created_at=$todayDate;
        $Notatki->save();
        $usterkimodel->save();
        

        // Notifikacje dla dodanie notatki
        // $department_id=Auth::user()->department_id;
        // $currentuser=auth()->user()->id;
        // $autor=$req->autor;

        //         $user=  User::find(auth()->user()->id)
        //         ->where('id', '!=', $currentuser)
        //         ->where('department_id', $department_id)
        //         ->get();
        //         foreach($user as $user)
        //         {
        //             $user->notify(new NewNoteNotification($usterkimodel));
        //         }
             



        return back()->with('success', 'Pomyślnie dodano nową notatkę do wpisu!');
    }

    function ShowData($id_usterki, $id_notatki)
    {  
        $usterkimodel=usterkimodel::where('id_usterki', $id_usterki)->get();
        $Notatki=Notatki::where('id_notatki', $id_notatki)->get();
        return view('editnote', ['Notatki'=>$Notatki[0], 'usterki'=>$usterkimodel[0]]);
     

     
    }

    function editnote(Request $req)
    {
        $usterki=usterkimodel::find($req->input('usterki'));
        $Notatki = Notatki::find($req->input('id_notatki'));
        $id_usterki= $req->input('id_usterki');
        $id_notatki = $req->input('id_notatki');
        $tresc_nt = $req->input('tresc_nt');
        $Notatki=Notatki::where('id_notatki', $id_notatki)->update(array('tresc_nt'=> $tresc_nt));
         return redirect('note/'.$id_usterki)->with('success', 'Pomyślnie edytowano notatkę!');

    }
}
