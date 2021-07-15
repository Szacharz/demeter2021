<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DepartmentStatsController extends Controller
{
    public function index()
    {   
        $year = ['2019','2020', '2021'];
        $month = ['Styczeń','Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień'];
        $month = ['01','02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $user = [];
        foreach ($month as $key => $value) {
            $user[] = User::where(DB::raw("DATE_FORMAT(created_at, '%m')"),$value)->count();
        }
        return view('departmentstats')->with('month',json_encode($month,JSON_NUMERIC_CHECK))->with('user',json_encode($user,JSON_NUMERIC_CHECK));
    }
}
