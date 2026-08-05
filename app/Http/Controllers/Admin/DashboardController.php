<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Message;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects' => Project::count(),
            'featured' => Project::featured()->count(),
            'messages' => Message::count(),
            'unread'   => Message::whereNull('read_at')->count(),
        ];

        $latestMessages = Message::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'latestMessages'));
    }
}
