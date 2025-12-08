<!-- resources/views/user/home.blade.php -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lost and Found</title>
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />
    <!-- Styles and Links -->
    <link rel="stylesheet" href="{{ asset('css/user.css') }}" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <!-- Header -->
    <header>
      <nav class="navbar">
        <div class="logo">
          <img
            src="{{ asset('assets/logo/Logologin.png') }}"
            width="100"
            alt="Lost and Found Logo"
          />
        </div>

        <!-- Hamburger Icon for Mobile -->
        <div class="menu-toggle" id="mobile-menu">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </div>

        <ul class="nav-links">
          <li><a href="{{ route('index') }}">Home</a></li>
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
          <!-- Displaying dynamic user name -->
          <span class="user-name">{{ Auth::user()->name }}</span>
          <!-- Ensure that the logged-in user's name is displayed here -->
          <button type="button" class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <img
              src="{{ asset('assets/icon/doorIcon.jpg') }}"
              alt=""
              class="logout-icon"
              width="18"
              height="18"
            />
            Log Out
          </button>

          <!-- Logout Form -->
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </nav>
    </header>

    <!-- Body -->
    <main>
      <section class="hero-section">
        <div class="hero-container">
          <div class="text-wrapper">
            <h1>Lost Something? Found Something?</h1>
            <p>Help your fellow students reunite with their belongings</p>
          </div>

          <div class="search-field">
            <div class="search-box">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
              >
                <circle cx="11" cy="11" r="8" />
                <line x1="21" y1="21" x2="16.65" y2="16.65" />
              </svg>
              <input
                type="text"
                id="search"
                name="search"
                placeholder="Search for lost or found items..."
              />
            </div>
          </div>

          <div class="button-group" onclick="location.href='reportLostItem'">
            <button class="btn btn-lost">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
                fill="currentColor"
              >
                <path
                  d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM11 15H13V17H11V15ZM11 7H13V13H11V7Z"
                ></path>
              </svg>
              Report Lost Items
            </button>

            <button class="btn btn-found" onclick="location.href='reportFoundItem'">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor"
              >
                <path d="M13 11h9v2h-9v9h-2v-9H2v-2h9V2h2v9z" />
              </svg>
              Report Found Items
            </button>
          </div>
        </div>
      </section>
    </main>

    <script src="{{ asset('js/admin.js') }}" type="module"></script>
    <!-- Footer -->
  </body>
</html>
