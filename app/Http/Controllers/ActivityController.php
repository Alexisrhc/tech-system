<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    public function index()
    {
    	$activitys = DB::table('activity')-get();
        return response()->json($activitys);
    }

    public function show($id)
    {
    	$activitys = DB::table('users')
    	->select(
            'users.name as nameUser',
            'users.lastname as lastnameUser',
            'activity.id_activity',
            'activity.activity',
            'activity.created_at'
        )
        ->join(
        	'activity',
        	'activity.id_user',
        	'users.id'
        )
        ->where('id_user',$id)
    	->paginate(10);
    	return view('activity.show', compact('activitys'));
    }
}
