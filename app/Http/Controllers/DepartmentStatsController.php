<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\usterkimodel;
use Illuminate\Http\Request;
use App\Models\Departments;
use Illuminate\Support\Facades\Auth;

class DepartmentStatsController extends Controller
{
    public function index()
    {   
        $department_id=Auth::user()->department_id;
        $Departments = new Departments;
        $Departments = Departments::where('id', $department_id)
        ->get();
        $year = ['2019','2020', '2021'];
        $monthsname = ['Styczeń','Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień'];
        $month = ['01','02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $usterki = []; 
        $user = [];
        $usterkifinished = [];
        $users =['Mateusz','Michał', 'Darek', 'Artur', 'Kuba', 'Miłosz', 'Szymon', 'Dominik'];
        $entryforuser=[];

        foreach ($month as $key => $value) {
            $user[] = User::where(DB::raw("DATE_FORMAT(created_at, '%m')"),$value)->count();
        }

        foreach ($month as $key =>$value){
            $usterki[] = usterkimodel::where(DB::raw("DATE_FORMAT(data, '%m')"),$value)->count();
        }

        foreach ($month as $key =>$value){
            $usterkifinished[] = usterkimodel::where(DB::raw("DATE_FORMAT(finished_at, '%m')"),$value)->count();
        }

        // $users[]=user::where('department_id',$department_id)
        // ->get('name');

        // foreach($users as $key =>$value)
        // {
        //     $entryforuser[] = usterkimodel::where(DB::raw("autor"),$value)->count();
        // }

        return view('departmentstats')->with('month',json_encode($month,JSON_NUMERIC_CHECK))->with('user',json_encode($user,JSON_NUMERIC_CHECK))->with('usterki',json_encode($usterki,JSON_NUMERIC_CHECK))->with('usterkifinished',json_encode($usterkifinished,JSON_NUMERIC_CHECK))->with('monthsname')->with('entryforuser',json_encode($entryforuser,JSON_NUMERIC_CHECK))->with('users');
    }
}
