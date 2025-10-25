<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\NotificationUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{

public function createNotification(Request $request)
    {
        $users = User::select('id', 'name', 'email')->get();
        $notifications = Notification::with('user')
            ->latest()
            ->paginate(10);
        
        $editNotification = null;
        if ($request->has('edit')) {
            $editNotification = Notification::findOrFail($request->edit);
        }
        
        return view('dashboard.pages.notification', compact('notifications', 'users', 'editNotification'));
    }

   public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'is_global' => 'boolean'
        ]);

        $validated['is_global'] = $request->input('is_global') ? 1 : 0;
        if ($validated['is_global']) {
            $validated['user_id'] = null;
        } else {
            $validated['user_id'] = $request->user_id;
        }

        Notification::create($validated);

        return redirect()->route('dashboard.notifications.create')
            ->with('success', 'Notification created successfully!');
    }


    // Admin: Update notification
    public function update(Request $request, Notification $notification)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'is_global' => 'boolean'
        ]);

        $validated['is_global'] = $request->input('is_global') ? 1 : 0;
        
        // If global notification, set user_id to null
        if ($validated['is_global']) {
            $validated['user_id'] = null;
        } else {
            $validated['user_id'] = $request->user_id;
        }

        $notification->update($validated);

        return redirect()->route('dashboard.notifications.create')
            ->with('success', 'Notification updated successfully!');
    }

    // Admin: Delete notification
    public function destroy($id)
    {
        // Admin can delete any notification
        $notification = Notification::findOrFail($id);
        $notification->delete();

        return response()->json(['success' => true]);
    }

    // User: Mark single notification as read
   public function markAsRead($id)
    {
        // Find the pivot record for the logged-in user
        $notificationUser = NotificationUser::where('notification_id', $id)
            ->where('user_id', Auth::id())
            ->first();

        // If it's a global notification, create a pivot record if it doesn't exist
        if (!$notificationUser) {
            $notificationUser = NotificationUser::create([
                'notification_id' => $id,
                'user_id' => Auth::id(),
                'is_read' => true,
            ]);
        } else {
            // Update the pivot record
            $notificationUser->update(['is_read' => true]);
        }

        return response()->json(['success' => true]);
    }

    // User: Mark all notifications as read
    public function markAllAsRead()
    {
        Notification::where(function($query) {
            $query->where('user_id', Auth::id())
                  ->orWhere('is_global', true);
        })->update(['is_read' => true]);
        
        return response()->json(['success' => true]);
    }

    // User: Get user's notifications (personal + global)
    public function getUserNotifications()
    {
        $notifications = Notification::with('user')
            ->forUser(Auth::id())
            ->latest()
            ->paginate(15);

        return view('dashboard.user.notifications', compact('notifications'));
    }

    // API: Get unread count for user
    public function getUnreadCount()
    {
        $count = Notification::forUser(Auth::id())
            ->unread()
            ->count();

        return response()->json(['count' => $count]);
    }

   public function destroyusernotification($id)
{
    $notification = NotificationUser::where('user_id', $id)
        ->where('user_id', Auth::id()) // make sure it's for current user
        ->first();

    if ($notification) {
        $notification->delete();
    }

    return response()->json(['success' => true]);
}

}
