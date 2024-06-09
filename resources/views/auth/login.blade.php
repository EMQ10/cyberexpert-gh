<html lang="en">
<head>
 <!-- Favicon -->
 <link href="{{ asset('img/cyber.ico') }}" rel="icon">
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ URL::asset('css/login/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">

    <title>Login - Cyber Experts Ghana</title>
</head>
<body>
    {{-- <x-guest-layout> --}}
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <span class="home"><a href="/"><i class="fa fa-home"></i></a></span>

                <form class="login" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" class="login__input" placeholder="Usenname / Email">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input id="password" name="password" required autocomplete="current-password" type="password" class="login__input" placeholder="Password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2 tom" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />


                    <button class="button login__submit">
                        <span class="button__text">Login</span>
                        <i class="button__icon fas fa-chevron-right"></i>

                    </button>


                <div class="social-login">
                    @if (Route::has('password.request'))
                            <a class="forgot__submit" style="text-decoration: none"  href="{{ route('password.request') }}">
                                {{ __('Forgot password?') }}
                            </a>
                    @endif
                </div>
            </form>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>
{{-- </x-guest-layout> --}}
</body>
</html>
