<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Messages • Lost & Found</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />
    <!-- Base styles and icons -->
    <link rel="stylesheet" href="{{ asset('css/user.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.css" rel="stylesheet" />
    <!-- Page styles -->
    <link rel="stylesheet" href="{{ asset('css/user.css') }}" />
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="{{ asset('assets/logo/brandlogo.png') }}" width="100" alt="Lost and Found Logo" />
            </div>
            <div class="menu-toggle" id="mobile-menu">
                <span class="bar"></span><span class="bar"></span><span class="bar"></span>
            </div>
            <ul class="nav-links">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('lostItems') }}">Lost Items</a></li>
                <li><a href="{{ route('foundItems') }}">Found Items</a></li>
                <li><a href="{{ route('report') }}">Report Item</a></li>
                <li>
                    <a class="active" href="{{ route('messages') }}">
                        Messages
                        @if ($unreadCount > 0)
                            <span class="sup">{{ $unreadCount }}</span>
                        @endif
                    </a>
                </li>
            </ul>
            <div class="nav-user">
                @auth
                    <img src="{{ asset('assets/icon/user-icon.png') }}" alt="User Avatar" class="user-avatar" width="20"
                        height="20" />
                    <span class="user-name">{{ Auth::user()->name }}</span>
                    <a href="{{ route('logout') }}" class="logout-btn">
                        <img src="{{ asset('assets/icon/doorIcon.jpg') }}" alt="" class="logout-icon"
                            width="18" height="18" />
                        Log Out
                    </a>
                @else
                    <a href="{{ route('login') }}" class="logout-btn">
                        <img src="{{ asset('assets/icon/doorIcon.jpg') }}" alt="" class="logout-icon"
                            width="18" height="18" />
                        Log In
                    </a>
                @endauth
            </div>
        </nav>
    </header>

    <main class="messages-hero">
        <div class="messages-container">
            <h1 class="page-title">Messages</h1>

            <section class="messages-card">
                <div class="card-header"
                    style="margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
                    <h2 class="card-heading">Send New Message</h2>
                    <form action="{{ route('sendMessage') }}" method="POST" class="send-message-form"
                        style="display: flex; gap: 10px; flex-wrap: wrap;">
                        @csrf
                        <input type="email" name="email" placeholder="Recipient Email" required
                            style="flex: 1; padding: 10px; border: 1px solid #ddd; border-radius: 6px; min-width: 200px;">
                        <input type="text" name="message" placeholder="Type your message..." required
                            style="flex: 2; padding: 10px; border: 1px solid #ddd; border-radius: 6px; min-width: 300px;">
                        <button type="submit" class="btn"
                            style="background: #e67e22; color: white; border: none; padding: 0 20px; border-radius: 6px; cursor: pointer;">Send</button>
                    </form>
                    @if ($errors->any())
                        <div style="color: red; margin-top: 10px; font-size: 0.9em;">
                            {{ $errors->first() }}
                        </div>
                    @endif
                </div>

                <h2 class="card-heading">Conversations</h2>

                <div class="messages-list">
                    @forelse($messages as $message)
                        <article class="conv {{ $message->is_read ? '' : 'unread-bg' }}"
                            style="padding: 15px; border-bottom: 1px solid #f0f0f0; display: flex; gap: 15px; align-items: start;">
                            <div class="avatar"
                                style="width: 40px; height: 40px; background: #ddd; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; color: #555;">
                                {{ strtoupper(substr($message->sender_id == Auth::id() ? $message->recipient->name : $message->sender->name, 0, 1)) }}
                            </div>
                            <div class="conv-main" style="flex: 1;">
                                <div class="conv-header"
                                    style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                    <div class="conv-name" style="font-weight: 600;">
                                        @if ($message->sender_id == Auth::id())
                                            To: {{ $message->recipient->name }}
                                        @else
                                            From: {{ $message->sender->name }}
                                        @endif
                                    </div>
                                    <span class="conv-time"
                                        style="font-size: 0.8em; color: #999;">{{ $message->created_at->diffForHumans() }}</span>
                                </div>
                                <div class="conv-snippet" style="color: #666; font-size: 0.95em;">
                                    @if ($message->sender_id == Auth::id())
                                        <span style="font-weight: bold; color: #777;">You:</span>
                                    @endif
                                    {{ $message->body }}
                                    @if (!$message->is_read && $message->recipient_id == Auth::id())
                                        <span class="unread-dot"
                                            style="display: inline-block; width: 8px; height: 8px; background: #e74c3c; border-radius: 50%; margin-left: 5px;"></span>
                                    @endif
                                </div>
                            </div>
                        </article>
                    @empty
                        <p style="text-align: center; padding: 20px; color: #999;">No messages yet.</p>
                    @endforelse
                </div>

                <div style="margin-top: 20px;">
                    {{ $messages->links() }}
                </div>
            </section>
        </div>
    </main>

    <script src="{{ asset('js/admin.js') }}" type="module"></script>
</body>

</html>
