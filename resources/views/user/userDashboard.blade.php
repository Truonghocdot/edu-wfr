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

    <main class="dash-hero">
      <div class="dash-container">
        <h1 class="welcome">Welcome Back, {{ Auth::user()->name }}! @if($unreadMessages > 0)<span style="color: #c33;">📬 {{ $unreadMessages }} new messages</span>@endif</h1>

        <section class="panel">
          <h2 class="panel-title">Manage your lost and found items</h2>

          <div class="tabs">
            <button class="tab active" type="button">My Items</button>
            <button class="tab" type="button">
              My Claims<span class="sup">{{ $myClaims->count() }}</span>
            </button>
          </div>

          <div class="sections-grid">
            <div class="col-left">
              <div class="section">
                <div class="section-row">
                  <i class="ri-search-eye-line"></i>
                  <span class="section-title">My Lost Items ({{ $myItems->where('type', 'lost')->count() }})</span>
                </div>
                @forelse($myItems->where('type', 'lost') as $item)
                  <div class="claim-item">
                    <div class="claim-center">
                      <div class="claim-title">{{ $item->title }}</div>
                      <div class="claim-meta">Status: {{ $item->status }} | {{ $item->category }}</div>
                    </div>
                    <div class="claim-status">
                      <i class="ri-edit-line"></i>
                      <a href="{{ route('viewLostItem', $item->id) }}" style="text-decoration: underline;">View</a>
                    </div>
                  </div>
                @empty
                  <p style="color: #999; padding: 10px;">No lost items reported yet. <a href="{{ route('reportLostItem') }}">Report one now</a></p>
                @endforelse
              </div>

              <div class="section">
                <div class="section-row">
                  <i class="ri-archive-2-line"></i>
                  <span class="section-title">My Found Items ({{ $myItems->where('type', 'found')->count() }})</span>
                </div>
                @forelse($myItems->where('type', 'found') as $item)
                  <div class="claim-item">
                    <div class="claim-center">
                      <div class="claim-title">{{ $item->title }}</div>
                      <div class="claim-meta">Status: {{ $item->status }} | {{ $item->category }}</div>
                    </div>
                    <div class="claim-status">
                      <i class="ri-edit-line"></i>
                      <a href="{{ route('viewFoundItem', $item->id) }}" style="text-decoration: underline;">View</a>
                    </div>
                  </div>
                @empty
                  <p style="color: #999; padding: 10px;">No found items reported yet. <a href="{{ route('reportFoundItem') }}">Report one now</a></p>
                @endforelse
              </div>
            </div>

            <div class="col-right">
              <div class="section">
                <div class="section-row">
                  <i class="ri-check-double-line"></i>
                  <span class="section-title">My Claims ({{ $myClaims->count() }})</span>
                </div>
                @forelse($myClaims as $claim)
                  <div class="claim-item">
                    <div class="claim-center">
                      <div class="claim-title">{{ $claim->item->title }}</div>
                      <div class="claim-meta">Claimed on {{ $claim->created_at->format('d/m/Y') }}</div>
                    </div>
                    <div class="claim-status">
                      @if($claim->status === 'pending')
                        <i class="ri-time-line" style="color: #f90;"></i>
                      @elseif($claim->status === 'approved')
                        <i class="ri-check-line" style="color: #3c3;"></i>
                      @else
                        <i class="ri-close-line" style="color: #c33;"></i>
                      @endif
                      <span style="text-transform: capitalize;">{{ $claim->status }}</span>
                    </div>
                  </div>
                @empty
                  <p style="color: #999; padding: 10px;">No claims yet</p>
                @endforelse
              </div>
            </div>
          </div>
        </section>
      </div>
    </main>

    <script src="{{ asset('js/admin.js') }}" type="module"></script>
  </body>
</html>
