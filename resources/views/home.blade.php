<x-layout>

    <!-- Header Section with Login, Register, and Logout -->
    <header>
        <div class="container">
            <nav>
                <ul>
                    <!-- Show login and register links for guests -->
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endguest

                    <!-- Show the user's name and a logout link for authenticated users -->
                    @auth
                        <li>Welcome, {{ Auth::user()->name }}</li>
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </nav>
        </div>
    </header>

    <div class="page-background">
        <main>
            <section class="hero">
                <h1 class="h1een">Welcome to Uneed-IT</h1>
                <p class="peenpm">aanpassing</p>
                <a href="{{ url('afspraak') }}" class="btn">Make an appointment</a>
            </section>

            <section class="services">
                <div class="container">
                    <div class="service">
                        <h3>Phone Repair</h3>
                        <p>We specialize in repairing all types of phones, including iPhones, Android devices, and more.</p>
                    </div>
                    <div class="picture">
                        <!-- You can add an image here if needed -->
                    </div>
                    <div class="service">
                        <h3>Laptop Repair</h3>
                        <p>Our expert technicians can diagnose and fix issues with laptops of any make and model.</p>
                    </div>
                    <div class="service">
                        <h3>PC Repair</h3>
                        <p>From hardware upgrades to software troubleshooting, we've got you covered for all your PC repair needs.</p>
                    </div>
                </div>
            </section>

            <!-- Optional Section for Authenticated Users -->
            @auth
                <section class="user-dashboard">
                    <div class="container">
                        <h2>Welcome back, {{ Auth::user()->name }}!</h2>
                        <p>Here’s your personalized dashboard:</p>
                        <!-- Add more dynamic content if necessary -->
                    </div>
                </section>
            @endauth

            <section class="iframe">
                <div class="container">
                    <div class="location">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2455.469405079923!2d4.6556065!3d52.0165458!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c5d125952a58cd%3A0x93f677d7fe6faaae!2sUneed-IT!5e0!3m2!1sen!2snl!4v1712919752830!5m2!1sen!2snl"
                            width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </section>
        </main>
    </div>

</x-layout>
