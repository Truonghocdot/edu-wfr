<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Report Item • Lost & Found</title>
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
          <li><a href="{{ route('lostItems') }}">Lost Items</a></li>
          <li><a href="{{ route('foundItems') }}">Found Items</a></li>
          <li><a class="active" href="{{ route('report') }}">Report Item</a></li>
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

    <main class="report-hero">
      <div class="report-container">
        <h1 class="page-title">Report Item</h1>

        <section class="report-card">
          <div class="card-top">
            <a class="back-link" href="javascript:history.back()">
              <i class="ri-arrow-left-line"></i> Back
            </a>
            <h2 class="card-title">Lost Item - I lost something</h2>
          </div>

          <form
            class="form-grid"
            action="#"
            method="post"
            enctype="multipart/form-data"
          >
            <div class="left-col">
              <label class="field-label" for="itemName"
                >Item Name<span class="req">*</span></label
              >
              <input
                id="itemName"
                name="itemName"
                type="text"
                placeholder="e.g., iPhone 6, Backpack, Book"
                required
              />

              <label class="field-label" for="category"
                >Category<span class="req">*</span></label
              >
              <select id="category" name="category" required>
                <option value="" selected disabled>Select a category</option>
                <option>Electronics</option>
                <option>Clothing</option>
                <option>Accessories</option>
                <option>ID / Documents</option>
                <option>Others</option>
              </select>

              <label class="field-label" for="description"
                >Description<span class="req">*</span></label
              >
              <textarea
                id="description"
                name="description"
                rows="3"
                placeholder="Provide a detailed description"
                required
              ></textarea>

              <label class="field-label" for="location"
                >Location<span class="req">*</span> (Where did you lose
                it?)</label
              >
              <select id="location" name="location" required>
                <option value="" selected disabled>Select a location</option>
                <option>Library</option>
                <option>Cafeteria</option>
                <option>Gym</option>
                <option>Parking</option>
                <option>Classroom</option>
              </select>

              <label class="field-label" for="dateLost"
                >Date<span class="req">*</span> (When did you lose it?)</label
              >
              <input id="dateLost" name="dateLost" type="date" required />
            </div>

            <div class="right-col">
              <div class="field-block">
                <div class="field-label">
                  Photo <span class="opt">(Optional)</span>
                </div>
                <label class="upload-area">
                  <input
                    id="photo"
                    name="photo"
                    type="file"
                    accept=".png,.jpg,.jpeg,.gif"
                    hidden
                  />
                  <span
                    ><b class="linkish">Upload a photo</b> or drag and
                    drop</span
                  >
                  <small>PNG, JPG, GIF up to 10MB</small>
                </label>
              </div>

              <label class="field-label" for="contactInfo"
                >Additional Contact Information
                <span class="opt">(Optional)</span></label
              >
              <input
                id="contactInfo"
                name="contactInfo"
                type="text"
                placeholder="Cellphone number, Email, Social Media"
              />

              <label class="checkbox">
                <input type="checkbox" id="anonymous" name="anonymous" />
                <span
                  >Post anonymously (your name won’t be shown publicly)</span
                >
              </label>

              <button class="report-btn" type="submit">Report Item</button>
            </div>
          </form>
        </section>
      </div>
    </main>

    <script src="{{ asset('js/admin.js') }}" type="module"></script>
  </body>
</html>
