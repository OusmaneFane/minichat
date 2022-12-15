<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthManager;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repository\ConversationRepository;

class ConversationsController extends Controller
{
    /**
    *@var ConversationRepository

    */
    private $r;

     /**
    *@var AuthManager
    */
    private $auth;
     /**
    *@var Message
    */
    private $message;

    public function __contruct(ConversationRepository $conversationRepository, AuthManager $auth, Message $message){
        $this->r = $conversationRepository;
        $this->auth = $auth;
        $this->message = $message;
    }
    public function index(){
        $users = User::select('name', 'id')
        ->where('id', '!=', Auth::user()->id)
        ->get();
         return view('conversations/index', compact('users'));

    }
    public function show(User $user){

        $messages = Message::where(function($query) use ($user){
            $query->where('to_id', '=', $user->id);
            $query->orWhere('to_id', '=', Auth::user()->id);
        })
                ->where(function ($query) use ($user) {
                    $query->where('from_id', '=', $user->id);
                    $query->orWhere('from_id', '=', Auth::user()->id);
                })
                            ->orderBy('id', "ASC")
                            ->get();
        $current_user = Auth::user();
        $users = User::select('name', 'id')
                     ->where('id', '!=', Auth::user()->id)
                     ->get();
        return view('conversations/show', compact('users', 'user', 'messages', 'current_user'));

    }
    public function store(User $user, Request $request){

        Message::create([
            'content' => request('content'),
            'from_id' => Auth::user()->id,
            'to_id' => $user->id,
            'read_at' => Carbon::now(),



        ]);
        // $this->r->createMessage(
        //     $request->get('content'),
        //     $this->auth->user()->id,
        //     $user->id
        // );
        return redirect(route('conversations.show', ['user' => $user->id]));
    }
}
