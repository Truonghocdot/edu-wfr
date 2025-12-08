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
      rel="stylesheet"
    />
    <!-- Base styles and icons -->
    <link rel="stylesheet" href="{{ asset('css/user.css') }}" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <!-- Page styles -->
    <link rel="stylesheet" href="{{ asset('css/user.css') }}" />
  </head>
  <body>
    <header>
      <nav class="navbar">
        <div class="logo">
          <img
            src="{{ asset('assets/logo/brandlogo.png') }}"
            width="100"
            alt="Lost and Found Logo"
          />
        </div>
        <div class="menu-toggle" id="mobile-menu">
          <span class="bar"></span><span class="bar"></span
          ><span class="bar"></span>
        </div>
        <ul class="nav-links">
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><a href="{{ route('lostItems') }}">Lost Items</a></li>
          <li><a href="{{ route('foundItems') }}">Found Items</a></li>
          <li><a href="{{ route('report') }}">Report Item</a></li>
          <li>
            <a class="active" href="{{ route('messages') }}"
              >Messages<span class="sup">1</span></a
            >
          </li>
        </ul>
        <div class="nav-user">
          <img
            src="{{ asset('assets/icon/user-icon.png') }}"
            alt="User Avatar"
            class="user-avatar"
            width="20"
            height="20"
            onclick="location.href='userDashboard'"
          />
          <span class="user-name">JiaBoy</span>
          <button type="button" class="logout-btn" onclick="location.href='createAccount'">
            <img
              src="{{ asset('assets/icon/doorIcon.jpg') }}"
              alt=""
              class="logout-icon"
              width="18"
              height="18"
            />
            Log Out
          </button>
        </div>
      </nav>
    </header>

    <main class="messages-hero">
      <div class="messages-container">
        <h1 class="page-title">Messages</h1>

        <section class="messages-card">
          <h2 class="card-heading">Conversations</h2>

          <article class="conv">
            <div class="avatar">A</div>
            <div class="conv-main">
              <div class="conv-name">Admin</div>
              <div class="conv-snippet">
                Admin: Your claim has been approved.
                <span class="unread">1</span>
              </div>
            </div>
          </article>
        </section>
      </div>
    </main>

    <script src="{{ asset('js/admin.js') }}" type="module"></script>
  </body>
</html>
