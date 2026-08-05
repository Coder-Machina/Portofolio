<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->get();
        return view('admin.messages.index', compact('messages'));
    }

    public function show(Message $message)
    {
        if (is_null($message->read_at)) {
            $message->markAsRead();
        }

        return view('admin.messages.show', compact('message'));
    }

    public function toggleRead(Message $message)
    {
        if (is_null($message->read_at)) {
            $message->markAsRead();
            $status = 'lu';
        } else {
            $message->markAsUnread();
            $status = 'non lu';
        }

        return redirect()->back()->with('success', "Message marqué $status.");
    }

    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route('admin.messages.index')->with('success', 'Message supprimé !');
    }
}
