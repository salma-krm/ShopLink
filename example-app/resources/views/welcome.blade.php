@extends('navfooter')
@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Discover Quality Products</h1>
            <p>Explore our curated collection of premium products designed to enhance your lifestyle. From cutting-edge technology to elegant accessories, we have something for everyone.</p>
            <a href="#products" class="btn">Shop Now</a>
        </div>
        <div class="hero-image">
            <img src="https://th.bing.com/th/id/OIP.BkYJOiu2uqwsvrFBexG6RAHaD4?w=289&h=180&c=7&r=0&o=5&pid=1.7" alt="Featured Product">
        </div>
    </section>
    <!-- Product Section -->
    <!-- <section id="products" class="products"> -->
        <h2>Our Featured Products</h2>
        <div class="product-grid">
        @foreach($produits as $produit)
            <div class="product-card">
                <img src="{{$produit->photo}}" alt="{{$produit->title}}">
                <div class="product-card-content">
                    <h3 class="room-title">{{$produit->title}}</h3>
                    <p class="product-price">{{$produit->description}}</p>
                    <h4>Prix: {{$produit->prix_unite}} </h4>
                    <a href="/Panier/{{$produit->id}}" class="product-btn">Ajouter au panier</a>
                </div>
            </div>
        @endforeach 
        </div>
           <!-- Bouton avec l'icône du panier -->
    <a href="/Panier" class="cart-btn">
        <i class="fas fa-shopping-cart"></i>
    </a>
    <!-- </section> -->

  @endsection