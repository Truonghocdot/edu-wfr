<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Found Item • Lost & Found</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />
    <!-- Base styles and navbar look -->
    <link rel="stylesheet" href="{{ asset('css/user.css') }}" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('css/user.css') }}" />
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
          <li><a href="{{ route('index') }}">Home</a></li>
          <li><a href="{{ route('lostItems') }}">Lost Items</a></li>
          <li><a class="active" href="{{ route('foundItems') }}">Found Items</a></li>
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

    <main class="detail-hero">
      <div class="detail-container">
        <section class="detail-card">
          <a class="back-link" href="javascript:history.back()">
            <i class="ri-arrow-left-line"></i> Back
          </a>

          <h1 class="detail-title">Found Item</h1>

          <div class="detail-grid">
            <div class="detail-media">
              <img src="{{ asset('assets/sample/iphone16.jpg') }}" alt="Found item photo" />
            </div>

            <div class="detail-info">
              <div class="meta triple">
                <div class="meta-block">
                  <div class="meta-label">Location</div>
                  <div class="meta-value">Library</div>
                </div>
                <div class="meta-block">
                  <div class="meta-label">Found on</div>
                  <div class="meta-value strong">10/02/2024</div>
                </div>
                <div class="meta-block">
                  <div class="meta-label">Reported by</div>
                  <div class="meta-value strong">Reign Baluya</div>
                </div>
              </div>

              <div class="description">
                <div class="meta-label">Description</div>
                <div class="desc-value">
                  <span class="strong">New gray</span><br />
                  <span class="strong">iPhone 6</span>
                </div>
              </div>

              <div class="cta-row">
                <button type="button" class="message-btn">
                  Message to Claim
                </button>
              </div>
            </div>
          </div>
        </section>
      </div>
    </main>

    <script src="{{ asset('js/admin.js') }}" type="module"></script>
  </body>
</html>
