<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\usterkimodel;
use App\Models\Notatki;
use App\Models\Departments;
use App\Models\GroupMembers;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notification;
use App\User;
class CalendarController extends Controller
{
  
    public function index()
    {
        $userid=Auth::user()->id;

        $user = User::find($userid);

        $notifications = $user->unreadNotifications;
        $ile=count($notifications);
         return view('calendar', compact('notifications'));
    }

    public function markNotification(Request $request)
    {
        Auth::user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();
        
        return response()->noContent();
 
    }
 
}
