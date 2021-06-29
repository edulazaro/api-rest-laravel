<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\MessageService;

class HomeController extends Controller
{
    /** @var MessageService */
    private $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    /**
     * Show the main page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $params = $request->all();

        $filters = [];  
        $filters['userId'] = $request->route('userId', false);

        $messages = $this->messageService->getMessages($filters );

        $users = User::all();
            
        return view('home', [
            'users' => $users,
            'messages' => $messages,
            'title' => 'API StreamGo',
            'description' => 'Demo API for StreamGo',
            'filters' => $filters
        ]);
    }
}
