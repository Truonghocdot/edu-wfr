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
          <li><a href="{{ route('index') }}">Home</a></li>
          <li><a class="active" href="{{ route('lostItems') }}">Lost Items</a></li>
          <li><a href="{{ route('foundItems') }}">Found Items</a></li>
          <li><a href="{{ route('report') }}">Report Item</a></li>
          <li><a href="{{ route('messages') }}">Messages</a></li>
        </ul>
        <div class="nav-user">
          @auth
            <img
              src="{{ asset('assets/icon/user-icon.png') }}"
              alt="User Avatar"
              class="user-avatar"
              width="20"
              height="20"
            />
            <span class="user-name">{{ Auth::user()->name }}</span>
            <a href="{{ route('logout') }}" class="logout-btn">
              <img
                src="{{ asset('assets/icon/doorIcon.jpg') }}"
                alt=""
                class="logout-icon"
                width="18"
                height="18"
              />
              Log Out
            </a>
          @else
            <a href="{{ route('login') }}" class="logout-btn">
              <img
                src="{{ asset('assets/icon/doorIcon.jpg') }}"
                alt=""
                class="logout-icon"
                width="18"
                height="18"
              />
              Log In
            </a>
          @endauth
        </div>
      </nav>
    </header>

    <main class="lost-hero">
      <div class="lost-container">
        <h1 class="page-title">Lost Items</h1>

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

        <p class="results-hint">Showing {{ $items->count() }} of {{ $items->total() }} lost items</p>

        <section class="cards">
          @forelse($items as $item)
            <article class="item-card">
              <div class="media">
                @if($item->image_path)
                  <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}" />
                @else
                  <img src="{{ asset('assets/sample/placeholder.jpg') }}" alt="No image" />
                @endif
              </div>
              <div class="content">
                <div class="meta-row">
                  <span class="tag tag-lost">Lost</span>
                  <span class="tag tag-muted">{{ $item->category }}</span>
                </div>
                <h3 class="item-title">{{ $item->title }}</h3>
                <div class="details">
                  <div>{{ $item->location }}</div>
                  <div>Lost on {{ $item->date_reported->format('d/m/Y') }}</div>
                  <div>By {{ $item->user->name }}</div>
                </div>
                <div class="actions">
                  <a href="{{ route('viewLostItem', $item->id) }}" class="view-btn">
                    <i class="ri-eye-line"></i>
                    View
                  </a>
                </div>
              </div>
            </article>
          @empty
            <p style="grid-column: 1/-1; text-align: center; padding: 40px; color: #999;">
              No lost items available
            </p>
          @endforelse
        </section>

        <!-- Pagination -->
        <div style="margin-top: 30px; text-align: center;">
          {{ $items->links() }}
        </div>
      </div>
    </main>

    <script src="{{ asset('js/admin.js') }}" type="module"></script>
  </body>
</html>
