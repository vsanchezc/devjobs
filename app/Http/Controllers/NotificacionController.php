<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $notificaciones = auth()->user()->unreadNotifications;

        // Historial notificaciones
        $historialNotificaciones = auth()->user()->readNotifications;

        // limpiar notificaciones
        auth()->user()->unreadNotifications->markAsRead();

        return view('notificaciones.index', [
            'notificaciones' => $notificaciones,
            'historialNotificaciones' => $historialNotificaciones,
        ]);
    }
}
