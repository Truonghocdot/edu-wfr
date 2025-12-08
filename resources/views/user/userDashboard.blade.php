<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Dashboard • Lost & Found</title>
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
          <li><a href="{{ route('messages') }}">Messages</a></li>
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

    <main class="dash-hero">
      <div class="dash-container">
        <h1 class="welcome">Welcome Back, JiaBoy!</h1>

        <section class="panel">
          <h2 class="panel-title">Manage your lost and found items</h2>

          <div class="tabs">
            <button class="tab active" type="button">My Items</button>
            <button class="tab" type="button">
              My Claims<span class="sup">1</span>
            </button>
          </div>

          <div class="sections-grid">
            <div class="col-left">
              <div class="section">
                <div class="section-row">
                  <i class="ri-search-eye-line"></i>
                  <span class="section-title">My Lost Items</span>
                </div>
                <!-- removed claim-item from here -->
              </div>

              <div class="section">
                <div class="section-row">
                  <i class="ri-archive-2-line"></i>
                  <span class="section-title">My Found Items</span>
                </div>
                <!-- Add found items list here when available -->
              </div>
            </div>

    

              <div class="claim-item">
                <div class="claim-center">
                  <div class="claim-title">iPhone 6</div>
                  <div class="claim-meta">Claimed on 10/03/2024</div>
                </div>
                <div class="claim-status">
                  <i class="ri-time-line"></i>
                  <span>Pending</span>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </main>

    <script src="{{ asset('js/admin.js') }}" type="module"></script>
  </body>
</html>
