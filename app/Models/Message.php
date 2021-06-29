<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Message extends Model
{
    /**
     * User who created the message
     * 
     * @return BelongsTo|Order
     */
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }


    use HasFactory;
}
