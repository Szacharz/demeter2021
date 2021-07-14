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

        $user = [];
        foreach ($year as $key => $value) {
            $user[] = User::where(DB::raw("DATE_FORMAT(created_at, '%Y')"),$value)->count();
        }
        return view('departmentstats')->with('year',json_encode($year,JSON_NUMERIC_CHECK))->with('user',json_encode($user,JSON_NUMERIC_CHECK));
    }
}
