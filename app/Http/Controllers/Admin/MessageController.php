<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;

class MessageController extends Controller
{
    /**
     * Display all messages.
     */
    public function index()
    {
        $messages = Message::latest()->paginate(15);

        return view(
            'admin.messages.index',
            compact('messages')
        );
    }


    /**
     * Display single message.
     */
    public function show(Message $message)
    {
        /*
        |--------------------------------------------------------------------------
        | Mark as read
        |--------------------------------------------------------------------------
        */

        if ($message->status === 'unread') {

            $message->update([
                'status' => 'read',
                'read_at' => now(),
            ]);
        }


        return view(
            'admin.messages.show',
            compact('message')
        );
    }


    /**
     * Mark message as unread.
     */
    public function markUnread(Message $message)
    {
        $message->update([
            'status' => 'unread',
            'read_at' => null,
        ]);

        return redirect()
            ->route('admin.messages.index')
            ->with(
                'success',
                'Message marked as unread.'
            );
    }


    /**
     * Delete message.
     */
    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()
            ->route('admin.messages.index')
            ->with(
                'success',
                'Message deleted successfully.'
            );
    }
}