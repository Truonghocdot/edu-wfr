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
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><a href="{{ route('lostItems') }}">Lost Items</a></li>
          <li><a href="{{ route('foundItems') }}">Found Items</a></li>
        </ul>

        <div class="action-buttons">
          <button
            type="button"
            class="login-btn"
            onclick="location.href='login'"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              width="22"
              height="22"
              fill="currentColor"
            >
              <path
                d="M1.99805 21.0001V19.0001L3.99805 18.9999V4.83465C3.99805 4.35136 4.34367 3.93723 4.81916 3.85078L14.2907 2.12868C14.6167 2.0694 14.9291 2.28564 14.9884 2.61167C14.9948 2.64708 14.998 2.68301 14.998 2.719V3.9999L18.998 4.00007C19.5503 4.00007 19.998 4.44779 19.998 5.00007V18.9999L21.998 19.0001V21.0001H17.998V6.00007L14.998 5.9999V21.0001H1.99805ZM12.998 4.3965L5.99805 5.66923V19.0001H12.998V4.3965ZM11.998 11.0001V13.0001H9.99805V11.0001H11.998Z"
              ></path>
            </svg>
            Login
          </button>

          <button
            type="button"
            class="register-btn"
            onclick="location.href='createAccount'"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              width="22"
              height="22"
              fill="currentColor"
            >
              <path
                d="M14 14.252V16.3414C13.3744 16.1203 12.7013 16 12 16C8.68629 16 6 18.6863 6 22H4C4 17.5817 7.58172 14 12 14C12.6906 14 13.3608 14.0875 14 14.252ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11ZM18 17V14H20V17H23V19H20V22H18V19H15V17H18Z"
              ></path>
            </svg>
            Register
          </button>
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

          <div class="button-group">
            <button class="btn btn-lost" onclick="location.href='reportLostItem'">
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
