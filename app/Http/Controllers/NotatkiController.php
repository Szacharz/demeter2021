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
use App\Models\images;
use DB;
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
            'tresc_nt'=>'required',
            'photo'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'  
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
        if($req->hasFile('photo'))
        {
        $images=new images;
        $images->img_code = base64_encode(file_get_contents($req->file('photo'))); 
        $tanotatka=DB::table('notatki')
        ->where('tresc_nt', '=', $req->tresc_nt)
        ->where('autor', '=', $req->autor)
        ->where('id_usterki', '=',$usterkimodel->id_usterki)
        ->orderBy('created_at')
        ->first();

        $images->id_usterki=$usterkimodel->id_usterki;
        $images->id_notatki=$tanotatka->id_notatki;
        $images->save();

        $idtejnotatki= $tanotatka->id_notatki;    

        notatki::where('id_notatki', $idtejnotatki)->update(['img_code'=>base64_encode(file_get_contents($req->file('photo')))]);
        }
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

    function showphoto($id_usterki, $id_notatki)
    {  
        $images=images::where('id_usterki', $id_usterki)
        ->where('id_notatki', $id_notatki)
        ->get();
    
        return view('modal.image', ['images'=>$images]);
     
    }

}
