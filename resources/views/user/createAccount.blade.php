<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create Account</title>
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="{{ asset('assets/logo/brandlogo.png') }}" width="100" alt="Lost and Found Logo" />
            </div>
            <div class="menu-toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="nav-links">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><a href="{{ route('lostItems') }}">Lost Items</a></li>
                <li><a href="#">Found Items</a></li>
            </ul>
        </nav>
    </header>

    <main class="auth-hero">
        <a class="back-link" href="{{ route('index') }}">
            <i class="ri-arrow-left-line"></i> Back
        </a>

        <div class="auth-content">
            <h1 class="auth-title">Create Account</h1>
            <p class="auth-subtitle">Join the Lost &amp; Found Community</p>

            <section class="auth-card">
                <div class="card-header">
                    <i class="ri-user-add-line"></i>
                    <span>Register</span>
                </div>

                <!-- Display success and error messages -->
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form class="auth-form" action="{{ route('loginPost') }}" method="POST">
                    @csrf

                    <label for="name">Full Name</label>
                    <input id="name" name="name" type="text" placeholder="Enter full name" required />

                    <label for="studentId">Student ID</label>
                    <input id="studentId" name="student_id" type="text" placeholder="Enter student ID" required />

                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" placeholder="Enter email" required />

                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" placeholder="Enter password" required />

                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm password" required />

                    <button class="submit-btn" type="submit">Create Account</button>
                </form>

                <p class="signin-cta">
                    Already have an account? <a href="{{ route('login') }}">Sign in here</a>
                </p>
            </section>
        </div>
    </main>

    <script src="{{ asset('js/admin.js') }}" type="module"></script>
</body>

</html>