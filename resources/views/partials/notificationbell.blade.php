<!DOCTYPE html>
<html lang="en">

<head>

    <style>
        /* Floating Bell */
        .notification-bell {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 1000;
        }

        .bell-button {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            font-size: 28px;
            cursor: pointer;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bell-button:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 30px rgba(0, 0, 0, 0.4);
        }

        .bell-button:active {
            transform: scale(0.95);
        }

        /* Badge for unread count */
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ff3333;
            color: white;
            border-radius: 50%;
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .notification-badge.hidden {
            display: none;
        }

        /* Notification Panel */
        .notification-panel {
            position: absolute;
            bottom: 80px;
            right: 0;
            width: 380px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            max-height: 500px;
            display: flex;
            flex-direction: column;
            opacity: 0;
            transform: translateY(-10px);
            pointer-events: none;
            transition: all 0.3s ease;
        }

        .notification-panel.active {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }

        /* Panel Header */
        .panel-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .panel-header h3 {
            font-size: 1.2em;
            font-weight: 600;
        }

        .close-btn {
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        .close-btn:hover {
            opacity: 0.8;
        }

        /* Notifications List */
        .notifications-list {
            overflow-y: auto;
            max-height: 350px;
            padding: 0;
        }

        .notification-item {
            padding: 16px;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            gap: 10px;
            transition: background 0.2s;
        }

        .notification-item:hover {
            background: #f9f9f9;
        }

        .notification-item.unread {
            background: #f0f4ff;
        }

        .notification-content {
            flex: 1;
        }

        .notification-message {
            font-weight: 600;
            color: #333;
            margin-bottom: 4px;
            font-size: 0.95em;
        }

        .notification-item.unread .notification-message {
            font-weight: 700;
        }

        .notification-time {
            font-size: 0.8em;
            color: #999;
        }

        .notification-actions {
            display: flex;
            gap: 8px;
        }

        .icon-btn {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 16px;
            color: #999;
            transition: color 0.2s;
            padding: 4px 8px;
        }

        .icon-btn:hover {
            color: #667eea;
        }

        .icon-btn.delete:hover {
            color: #ff3333;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #999;
        }

        .empty-state-icon {
            font-size: 32px;
            margin-bottom: 10px;
            opacity: 0.5;
        }

        /* Panel Footer */
        .panel-footer {
            padding: 12px;
            border-top: 1px solid #f0f0f0;
            text-align: center;
        }

        .mark-all-btn {
            background: none;
            border: none;
            color: #667eea;
            cursor: pointer;
            font-size: 0.9em;
            font-weight: 600;
            transition: color 0.2s;
        }

        .mark-all-btn:hover {
            color: #764ba2;
        }

        .panel-footer.hidden {
            display: none;
        }

        /* Animation */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 480px) {
            .notification-panel {
                width: calc(100vw - 40px);
                right: -20px;
            }

            .bell-button {
                width: 50px;
                height: 50px;
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <!-- Notification Bell -->
    <div class="notification-bell">
        <button class="bell-button" id="bellBtn">🔔</button>
        <div class="notification-badge" id="badge">
            {{ $notification->where(function ($n) {return $n->is_global || $n->user_id === Auth::id();})->count() }}
        </div>

        <!-- Notification Panel -->
        <div class="notification-panel" id="panel">
            <div class="panel-header">
                <h3>Notifications</h3>
                <button class="close-btn" id="closeBtn">✕</button>
            </div>

            <div class="notifications-list" id="notificationsList">
                @php
                    $userNotifications = $notification->filter(function ($notifi) {
                        return $notifi->is_global || $notifi->user_id === Auth::id();
                    });
                @endphp

                @if ($userNotifications->count() > 0)
                    @foreach ($userNotifications as $notifi)
                        <div class="notification-item {{ !$notifi->is_read ? 'unread' : '' }}"
                            data-id="{{ $notifi->id }}">
                            <div class="notification-content">
                                <div class="notification-message">{{ $notifi->message }}</div>
                                <div class="notification-time">{{ $notifi->created_at->format('M d, Y h:i A') }}</div>
                            </div>
                            <div class="notification-actions">
                                @if (!$notifi->is_read)
                                    <button class="icon-btn mark-read" data-id="{{ $notifi->id }}"
                                        title="Mark as read">✓</button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="notification-item unread">
                        <div class="notification-content">
                            <div class="notification-message">NO NOTIFICATION</div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        const bellBtn = document.getElementById('bellBtn');
        const closeBtn = document.getElementById('closeBtn');
        const panel = document.getElementById('panel');
        const badge = document.getElementById('badge');
        const markAllBtn = document.querySelector('.mark-all-btn');
        const footer = document.getElementById('footer');
        const notificationsList = document.getElementById('notificationsList');

        // Toggle panel
        bellBtn.addEventListener('click', () => {
            panel.classList.toggle('active');
        });

        // Close panel
        closeBtn.addEventListener('click', () => panel.classList.remove('active'));
        document.addEventListener('click', e => {
            if (!e.target.closest('.notification-bell')) panel.classList.remove('active');
        });

        // CSRF token
        const csrf = '{{ csrf_token() }}';

        // Mark single notification as read
        notificationsList.addEventListener('click', e => {
            if (e.target.classList.contains('mark-read')) {
                const id = e.target.dataset.id;
                fetch(`/notifications/mark-read/${id}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrf
                    },
                }).then(() => {
                    const item = e.target.closest('.notification-item');
                    item.classList.remove('unread');
                    e.target.remove();
                    updateBadge();
                });
            }
        });
    </script>
</body>

</html>
