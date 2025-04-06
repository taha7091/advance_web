<style>
    header {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 999;
        background-color: rgba(255, 255, 255, 0.9);  /* Semi-transparent background */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px; /* Adjusted for better spacing */
    }

    .header-left {
        display: flex;
        align-items: center;
        gap: 20px;
        font-size: 0.9rem;
        color: #333;
    }

    .header-left a {
        color: #333;
        text-decoration: none;
        font-weight: bold;
    }

    .header-nav {
        display: flex;
        justify-content: flex-end;
    }

    .styled-button {
        padding: 0.5rem 1rem;
        font-size: 0.8rem;
        font-weight: bold;
        color: #ffffff;
        background: linear-gradient(to bottom, #171717, #242424);
        border-radius: 9999px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #292929;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 1), 0 8px 12px rgba(0, 0, 0, 0.3);
        transition: all 0.2s ease;
    }

    .styled-button .inner-button {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(to bottom, #171717, #242424);
        width: 24px;
        height: 24px;
        margin-left: 6px;
        border-radius: 50%;
        border: 1px solid #252525;
    }

    .styled-button .icon {
        height: 14px;
        width: 14px;
        filter: drop-shadow(0 10px 20px rgba(26, 25, 25, 0.9))
                drop-shadow(0 0 4px rgba(0, 0, 0, 1));
        transition: all 0.4s ease-in-out;
    }

    .styled-button .icon:hover {
        transform: rotate(-35deg);
        filter: drop-shadow(0 10px 20px rgba(50, 50, 50, 1))
                drop-shadow(0 0 20px rgba(2, 2, 2, 1));
    }

    /* Ensure the header does not overlap content */
    body {
        padding-top: 70px; /* Adjust based on header height */
    }
</style>

<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] min-h-screen relative">

    <header>
        <!-- Left-aligned section with email and phone -->
        <div class="header-left">
            <a href="mailto:company@example.com">company@example.com</a>
            <span>|</span>
            <a href="tel:+1234567890">+123 456 7890</a>
        </div>

        <!-- Right-aligned navigation for login/register buttons -->
        <nav class="header-nav">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="styled-button">
                        Dashboard
                    </a>
                @else
                    <!-- Login Button -->
                    <a href="{{ route('login') }}" class="styled-button">
                        Log in
                        <div class="inner-button">
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M10 17l5-5-5-5v4H3v2h7v4z" />
                            </svg>
                        </div>
                    </a>

                    <!-- Register Button -->
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="styled-button">
                            Register
                            <div class="inner-button">
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M14 7l5 5-5 5v-4H3v-2h11V7z" />
                                </svg>
                            </div>
                        </a>
                    @endif
                @endauth
            @endif
        </nav>
    </header>
</body>
