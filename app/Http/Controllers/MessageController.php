<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->all();

        $rules = [];
        if (isset($params['userId'])) $rules['userId'] = 'exists:users,id';

        $validator = Validator::make($params, $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 400);
        }

        $messagesQuery = new Message;
        $messagesQuery->with(['user']);
        

        if (isset($params['userId'])) {
            $messagesQuery->where('user_id', $params['userId']);
        }
        
        $messages = $messagesQuery->get();
  

        return response()->json([
            'success' => true,
            'data' => $messages
        ], 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get request parameters
        $params = $request->all();

        // Get current user
        $user = auth()->user();

        $rules = [
            'content' => 'required|min:1|max:255',
        ];
        
        $validator = Validator::make($params, $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 400);
        }

        $message = new Message();
        $message->user_id = $user->id;
        $message->content = $params['content'];
        $message->save();

        return response()->json([
            'success' => true,
            'data' => $message
        ], 201);
    }
}
