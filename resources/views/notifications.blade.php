


{{-- notifications.blade.php --}}
<h2>Unread Notifications</h2>
<ul>
    @foreach (auth()->user()->unreadNotifications as $notification)
        <li>
            {{ $notification->data['follower_name'] }} started following you.
            <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST">
                @csrf
                <button type="submit">Mark as Read</button>
            </form>
        </li>
    @endforeach
</ul>

<h2>Read Notifications</h2>
<ul>
    @foreach (auth()->user()->readNotifications as $notification)
        <li>
            {{ $notification->data['follower_name'] }} started following you (Read).
        </li>
    @endforeach
</ul>
