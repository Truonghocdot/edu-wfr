<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lost Items • Lost & Found</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />
    <!-- Base styles and icons -->
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
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

    <main class="lost-hero">
      <div class="lost-container">
        <h1 class="page-title">Found Items</h1>

        <section class="filters-panel">
          <div class="filter search">
            <div class="pill">
              <i class="ri-search-line"></i>
              <input type="text" placeholder="Search lost items..." />
            </div>
          </div>

          <div class="filter select">
            <button class="pill" type="button">
              <i class="ri-apps-2-line"></i>
              <span>All Categories</span>
              <i class="ri-arrow-down-s-line chev"></i>
            </button>
          </div>

          <div class="filter select">
            <button class="pill" type="button">
              <i class="ri-map-pin-line"></i>
              <span>All Locations</span>
              <i class="ri-arrow-down-s-line chev"></i>
            </button>
          </div>
        </section>

        <p class="results-hint">Showing 1 of 1 found item</p>

        <section class="cards">
          <article class="item-card">
            <div class="media">
              <img src="{{ asset('assets/sample/iphone16.jpg') }}" alt="iPhone 6" />
            </div>
            <div class="content">
              <div class="meta-row">
                <span class="tag tag-found">Found</span>
                <span class="tag tag-muted">Electronics</span>
              </div>
              <h3 class="item-title">iPhone 6</h3>
              <div class="details">
                <div>Library</div>
                <div>Found on 10/1/2025</div>
                <div>By Reign Baluya</div>
              </div>
              <div class="actions">
                <button
                  class="view-btn"
                  type="button"
                  onclick="location.href='viewFoundItem'"
                >
                  <i class="ri-eye-line"></i>
                  View
                </button>
              </div>
            </div>
          </article>
        </section>
      </div>
    </main>

    <script src="{{ asset('js/admin.js') }}" type="module"></script>
  </body>
</html>
