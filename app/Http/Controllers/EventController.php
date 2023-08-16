<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\View\View;
use Illuminate\Http\Request;

class EventController extends Controller
{
    function EventPage():View{
        return view('pages.dashboard.event-page');
    }

    function EventList(Request $request){
        $user_id=$request->header('id');
        return Event::where('user_id',$user_id)->get();
    }

    function EventCreate(Request $request){
        $user_id=$request->header('id');
        return Event::create([
            'title'=>$request->input('title'),
            'date'=>$request->input('date'),
            'time'=>$request->input('time'),
            'location'=>$request->input('location'),
            'description'=>$request->input('description'),
            'user_id'=>$user_id
        ]);
    }

    function EventByID(Request $request){
        $event_id=$request->input('id');
        $user_id=$request->header('id');
        return Event::where('id',$event_id)->where('user_id',$user_id)->first();
    }

    function EventUpdate(Request $request){
        $event_id=$request->input('id');
        $user_id=$request->header('id');
        return Event::where('id',$event_id)->where('user_id',$user_id)->update([
            'title'=>$request->input('title'),
            'date'=>$request->input('date'),
            'time'=>$request->input('time'),
            'location'=>$request->input('location'),
            'description'=>$request->input('description'),
        ]);
    }

    function EventDelete(Request $request){
        $event_id=$request->input('id');
        $user_id=$request->header('id');
        return Event::where('id',$event_id)->where('user_id',$user_id)->delete();
    }
}
