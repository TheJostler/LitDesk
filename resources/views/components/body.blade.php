<body class="antialiased dark:text-white">
    <div class="bodyRoot">
        @if (Route::has('login'))
            <div class="authHeader">
                @auth
                    <a href="{{ route('home') }}" class="authItem">Home</a> <br> 
                    <a href="{{ route('auth.logout') }}" class="authItem">Logout</a>
                @else
                    <a href="{{ route('login') }}" class="authItem">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 authItem">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        {{ $slot }}



        <div class="footer1">
            <div class="footer2">
                <div class="footer3">
                    <a href="https://tegosec.com">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                        Josjuar Lister - TegoSec 2024
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>