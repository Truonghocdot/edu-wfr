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
    @vite(['resources/css/admin.css','resources/css/user.css'])
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
                        <a href="{{ route('dashboard') }}" class="active">
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
                        <a href="{{ route('message') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor"><path d="M3 3H21V17H7L3 21V3Z"></path></svg>
                            <span>Message</span>
                        </a>
                    </div>
                </nav>
            </div>
        
            <div class="user-account">
                <a href="{{ route('logout') }}" style="text-decoration: none; color: inherit;">
                    <span class="username">Logout</span>
                </a>
            </div>

        </aside>

    <!-- Main Content -->
        <main class="main-content">
            <header>
                <h1>Admin Dashboard</h1>
                <p>Manage users, items, and claims</p>
            </header>

            <section class="stats">
                <div class="card">
                    <h2>Total Users</h2>
                    <div class="stat-value">{{ $totalUsers }}</div>
                    <p>Registered Users</p>
                </div>

                <div class="card">
                    <h2>Total Items</h2>
                    <div class="stat-value">{{ $totalItems }}</div>
                    <p>Lost and Found Items</p>
                </div>

                <div class="card">
                    <h2>Lost Items</h2>
                    <div class="stat-value">{{ $lostItems }}</div>
                    <p>Items reported lost</p>
                </div>

                <div class="card">
                    <h2>Found Items</h2>
                    <div class="stat-value">{{ $foundItems }}</div>
                    <p>Items reported found</p>
                </div>

                <div class="card">
                    <h2>Pending Claims</h2>
                    <div class="stat-value">{{ $pendingClaims }}</div>
                    <p>Awaiting approval</p>
                </div>

                <div class="card">
                    <h2>Total Claims</h2>
                    <div class="stat-value">{{ $totalClaims }}</div>
                    <p>All claims</p>
                </div>

                <div class="card">
                    <h2>Resolved Items</h2>
                    <div class="stat-value">{{ $resolvedItems }}</div>
                    <p>Successfully resolved</p>
                </div>
            </section>

                <div class="card">
                    <h2>Pending Claims</h2>
                    <div class="stat-value">1</div>
                    <p>Awaiting Review</p>
                </div>

                <div class="card">
                    <h2>Active Items</h2>
                    <div class="stat-value">1</div>
                    <p>Still Available</p>
                </div>
            </section>
        </main>
  </div>
</body>
</html>