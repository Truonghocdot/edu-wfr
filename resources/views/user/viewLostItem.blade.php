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

    <main class="detail-hero">
      <div class="detail-container">
        <section class="detail-card">
          <a class="back-link" href="javascript:history.back()">
            <i class="ri-arrow-left-line"></i> Back
          </a>

          <h1 class="detail-title">Lost Item</h1>

          <div class="detail-grid">
            <div class="detail-media">
              @if($item->image_path)
                <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}" />
              @else
                <img src="{{ asset('assets/sample/placeholder.jpg') }}" alt="No image" />
              @endif
            </div>

            <div class="detail-info">
              <div class="meta triple">
                <div class="meta-block">
                  <div class="meta-label">Location</div>
                  <div class="meta-value">{{ $item->location }}</div>
                </div>
                <div class="meta-block">
                  <div class="meta-label">Lost on</div>
                  <div class="meta-value strong">{{ $item->date_reported->format('d/m/Y') }}</div>
                </div>
                <div class="meta-block">
                  <div class="meta-label">Reported by</div>
                  <div class="meta-value strong">{{ $item->user->name }}</div>
                </div>
              </div>

              <div class="description">
                <div class="meta-label">Item Name</div>
                <h2 style="font-size: 28px; margin: 10px 0;">{{ $item->title }}</h2>
              </div>

              <div class="description">
                <div class="meta-label">Category</div>
                <p>{{ $item->category }}</p>
              </div>

              <div class="description">
                <div class="meta-label">Description</div>
                <p>{{ $item->description }}</p>
              </div>

              <div class="description">
                <div class="meta-label">Status</div>
                <p style="text-transform: capitalize; font-weight: bold;">{{ $item->status }}</p>
              </div>

              @auth
                @if($item->user_id !== Auth::id())
                  <form method="POST" action="{{ route('createClaim', $item->id) }}" style="margin-top: 20px;">
                    @csrf
                    <textarea name="message" placeholder="Optional: Tell them why you found this item..." style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; margin-bottom: 10px; font-family: inherit;"></textarea>
                    <button type="submit" class="action-btn" style="width: 100%; background: #007bff; color: white; padding: 12px; border: none; border-radius: 4px; cursor: pointer;">
                      I found this item
                    </button>
                  </form>
                @endif
              @else
                <p style="color: #999; margin-top: 20px;"><a href="{{ route('login') }}">Login</a> if you found this item</p>
              @endauth
            </div>

              <div class="cta-row">
                <button type="button" class="message-btn">
                  Message if Found
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
