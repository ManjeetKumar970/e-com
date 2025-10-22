<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function markAsRead($id)
{
    $notification = Notification::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
    $notification->update(['is_read' => true]);

    return response()->json(['success' => true]);
}

public function markAllAsRead()
{
    Notification::where('user_id', Auth::id())->update(['is_read' => true]);
    return response()->json(['success' => true]);
}

public function destroy($id)
{
    $notification = Notification::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
    $notification->delete();

    return response()->json(['success' => true]);
}

}
