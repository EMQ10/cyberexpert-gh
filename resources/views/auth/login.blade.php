{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


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
                        {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}

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
