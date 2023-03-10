<?php
namespace App\Repository;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Message;

class ConversationRepository{

     /**
      *@var User
      */
    private $user;
     /**
      *@var Message
      */
      private $message;

    public function __construct(User $user, Message $message){
        $this->user = $user ;
        $this->message = $message;
    }
    public function getConversations (int $userId) {
          return  $this->user->newQuery()
            ->select('name', 'id')
            ->where('id', '!=', $userId)
            ->get();
    }
    public function createMessage(string $content, int $from, int $to ){
        return $this->message->newQuery()->create([
            'content' => $content,
            'from_id' => $from,
            'to_id' => $to,
            'created_at' => Carbon::now()

        ]);

    }
}
