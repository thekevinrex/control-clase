<?php

namespace App\Http\Controllers;

use App\Models\Notifiaction;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function show()
    {
        $notificaciones = Notifiaction::where('to_user_id', auth()->id())->orderBy('created_at', 'desc')->get();

        Notifiaction::where('to_user_id', auth()->id())->where('seen', false)->update(['seen' => true]);

        return view('notifications.show', compact('notificaciones'));
    }

    public function view(Notifiaction $notificacion)
    {
        return view('notifications.view', compact('notificacion'));
    }
}
