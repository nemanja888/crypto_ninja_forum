<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use App\Channel;
use Auth;
use Illuminate\Pagination\Paginator;

class ForumsController extends Controller
{
    public function index(){



        switch (request('filter')){
            case 'me':
                $results = Discussion::where('user_id', Auth::id())->paginate(5);
            break;

            case 'closed':
                $closed = array();

                foreach(Discussion::all() as $d){
                    if($d->hasBestAnswer()){
                        array_push($closed, $d);
                    }
                }

                $results = new Paginator($closed, 5);
            break;

            case 'open':
                $open = array();

                foreach(Discussion::all() as $d){
                    if(!$d->hasBestAnswer()){
                        array_push($open, $d);
                    }
                }

                $results = new Paginator($open, 5);
                break;

            default:
                $results = Discussion::orderBy('created_at','desc')->paginate(5);
            break;
        }

        return view('forum',['discussions' => $results]);

    }

    public function channel($slug){

        $channel = Channel::where('slug',$slug)->first();

        return view('channel')->with('discussions',$channel->discussions()->paginate(5));

    }
}
