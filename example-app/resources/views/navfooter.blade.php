<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Professional Online Store</title>
    <link rel="stylesheet" href="{{asset('css/produit.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar">
        <a href="#" class="navbar-logo">ProfessionalStore</a>
        <ul class="navbar-links">
            <li><a href="/">Home</a></li>
            <li><a href="/Panier">Panier</a></li>
           
            @auth
            <li><a href="/produits">Products</a></li>
                @if(auth()->user()->role->name == 'Admin')
                    <li><a href="/produits/show">Manage Products</a></li>
                    <li><a href="/categorie/show">Manage Categories</a></li>
                @endif
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </li>
                
            @else
                <li><a href="{{ route('login') }}">Log in</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @endauth
            
        </ul>
    </nav>



    <!-- Product Section -->
    <section id="products" class="products">
        @yield('content')
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-section">
            <h4>Company</h4>
            <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Press</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h4>Customer Service</h4>
            <ul>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Shipping</a></li>
                <li><a href="#">Returns</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h4>Shop</h4>
            <ul>
                <li><a href="#">New Arrivals</a></li>
                <li><a href="#">Best Sellers</a></li>
                <li><a href="#">Sale</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h4>Connect</h4>
            <ul>
                <li><a href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
                <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
            </ul>
        </div>
    </footer>
</body>

</html>