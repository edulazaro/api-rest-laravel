<?php

namespace App\Services;

use App\Models\Message;
use Illuminate\Support\Facades\Http;

class MessageService
{
    /**
     * Get the messages
     * 
     * @var params The params array
     * 
    * @return Message[]
     */
    public function getMessages($filters)
    {
        $messages = new Message;

        if (isset($filters['userId']) && intval($filters['userId']) !== 0) {
            $messages = $messages->where('user_id', $filters['userId']);
        }

        $messages = $messages->orderBy('created_at')->get();

        return $messages ? $messages : [];
    }
}
