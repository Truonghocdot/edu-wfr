<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login • Lost & Found</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />
    <!-- Base styles and icons -->
    <link rel="stylesheet" href="{{ asset('css/user.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.css" rel="stylesheet" />
    <!-- Page styles -->
    <link rel="stylesheet" href="{{ asset('css/user.css') }}" />
</head>

<body>
    <!-- Header -->
    <!-- Login Body -->
    <main class="login-hero">
        <div class="login-container">
            <div class="brand-side">
                <img class="brand-graphic" src="{{ asset('assets/logo/Logologin.png') }}" alt="Lost & Found" />
            </div>

            <div class="auth-side">
                <div class="auth-headings">
                    <h1 class="auth-title">Welcome Back</h1>
                    <p class="auth-subtitle">Sign in to your account</p>
                </div>

                <section class="auth-card">
                    <div class="card-header">
                        <img src="{{ asset('assets/icon/doorIcon.jpg') }}" width="22" height="22"
                            alt="Login" />
                        <span>Login</span>
                    </div>

                    <!-- Updated Form with POST method -->
                    <form class="auth-form" action="{{ route('loginPost') }}" method="POST">
                        @csrf

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" required value="{{ old('email') }}" />

                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" required />

                        <!-- Submit button -->
                        <button class="submit-btn" type="submit">Sign in</button>
                    </form>

                    <p class="signup-cta">
                        Don’t have an account?
                        <a href="{{ route('createAccount') }}">Sign up here</a>
                    </p>
                </section>
            </div>
        </div>
    </main>

    <script src="{{ asset('js/admin.js') }}" type="module"></script>
</body>

</html>
