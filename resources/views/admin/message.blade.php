<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- Styles and Links -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.css" rel="stylesheet" /> 

</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="logo_and_links">
                <div class="profile">
                    <div class="logo">
                        <img src="{{ asset('assets/logo/brandlogo.png') }}" width="100" alt="Lost and Found Logo">
                    </div>
                </div>

                <nav class="nav-links">
                    <div class="links">
                        <a href="{{ route('dashboard') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor"><path d="M20 20C20 20.5523 19.5523 21 19 21H5C4.44772 21 4 20.5523 4 20V11L1 11L11.3273 1.6115C11.7087 1.26475 12.2913 1.26475 12.6727 1.6115L23 11L20 11V20ZM11 13V19H13V13H11Z"></path></svg>
                        <span>Home</span>
                        </a>
                        <a href="{{ route('claims') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor"><path d="M6 4V8H18V4H20.0066C20.5552 4 21 4.44495 21 4.9934V21.0066C21 21.5552 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5551 3 21.0066V4.9934C3 4.44476 3.44495 4 3.9934 4H6ZM9 17H7V19H9V17ZM9 14H7V16H9V14ZM9 11H7V13H9V11ZM16 2V6H8V2H16Z"></path></svg>
                            <span>Claims</span>
                        </a>
                        <a href="{{ route('items') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor"><path d="M12 1 21.5 6.5V17.5L13 22.4211V11.4234L3.49793 5.92225 12 1ZM2.5 7.6555V17.5L11 22.4211V12.5765L2.5 7.6555Z"></path></svg>
                            <span>Items</span>
                        </a>
                        <a href="{{ route('users') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor"><path d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13Z"></path></svg>
                            <span>Users</span>
                        </a>
                        <a href="#" class="active">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor"><path d="M3 3H21V17H7L3 21V3Z"></path></svg>
                            <span>Message</span>
                        </a>
                    </div>
                </nav>
            </div>
        
            <div class="user-account">
            @auth
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span class="username">{{ Auth::user()->name }}</span>
                    <a href="{{ route('logout') }}" style="color: #666; text-decoration: none;">Logout</a>
                </div>
            @endauth
            </div>
        </aside>

    <!-- Main Content -->
        <main class="main-content">
            <header>
                <h1>Messages</h1>
                <p>View all system notifications and communications</p>
            </header>

            <section class="table">
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($messages as $message)
                                <tr style="background-color: {{ $message->is_read ? '#fff' : '#f9f9ff' }};">
                                    <td>#{{ $message->id }}</td>
                                    <td>{{ $message->sender->name }}</td>
                                    <td>{{ $message->recipient->name }}</td>
                                    <td style="max-width: 300px; overflow: hidden; text-overflow: ellipsis;">{{ Str::limit($message->body, 50) }}</td>
                                    <td><span class="badge {{ $message->is_read ? 'badge-success' : 'badge-warning' }}">{{ $message->is_read ? 'Read' : 'Unread' }}</span></td>
                                    <td>{{ $message->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No messages found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $messages->links() }}
                </div>
            </section>

        </main>
    

    <script type="module" src="{{ asset('js/admin.js') }}"></script>

</body>
</html>