<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNEED-IT</title>
    <meta name="description" content="Your one-stop solution for all your IT needs.">
    <meta name="keywords" content="IT, repair, services, phones, laptops, PCs">
    @vite(['resources/css/home.css'])
    @vite(['resources/css/contact.css'])
    @vite(['resources/css/nieuws.css'])
    @vite(['resources/css/about.css'])
    @vite(['resources/css/aanvraag.css'])
</head>
<body>
<header>
    <div class="container">
        <div class="logo">
            <img src="images/logo.png" alt="UNEED-IT Logo">
        </div>
        <nav class="nav">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/views/about') }}">About</a></li>
                <li><a href="{{ url('/views/nieuws') }}">Nieuws</a></li>
                <li><a href="{{ url('/views/contact') }}">Contact</a></li>
                <li><a href="{{ url('/views/aanvraag') }}">Aanvraag doen</a></li>
                <li><a href="{{ url('/views/faq') }}">FAQ</a></li>
            </ul>
        </nav>

    </div>
</header>
<main>
    {{$slot}}
</main>
<footer>
    <div class="container">
        <p>&copy; 2024 UNEED-IT. All rights reserved.</p>
    </div>
</footer>
</body>
</html>
