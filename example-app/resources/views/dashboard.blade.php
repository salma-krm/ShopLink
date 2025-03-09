@extends('navfooter')
@section('content')
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits</title>
    <script src="https://cdn.tailwindcss.com"></script>
   
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-gray-50 font-sans text-gray-700 overflow-x-hidden">
    <!-- Navbar is commented out in original -->
    <!-- <nav class="fixed w-full bg-white shadow-sm z-40 px-[5%] py-4 flex justify-between items-center transition-all duration-300">
        <a href="#" class="text-2xl font-bold text-primary animate-[slideIn_0.7s_ease]">ProfessionalStore</a>
        <ul class="flex list-none animate-[fadeIn_0.7s_ease]">
            <li class="ml-6"><a href="/" class="no-underline text-secondary font-medium relative transition-colors duration-300 hover:text-accent after:content-[''] after:absolute after:w-0 after:h-0.5 after:bottom-[-5px] after:left-0 after:bg-accent after:transition-all after:duration-300 hover:after:w-full">Home</a></li>
            @auth
            @if(auth()->user()->role->name == 'Admin') 
                <li class="ml-6"><a href="/produits/show" class="no-underline text-secondary font-medium relative transition-colors duration-300 hover:text-accent after:content-[''] after:absolute after:w-0 after:h-0.5 after:bottom-[-5px] after:left-0 after:bg-accent after:transition-all after:duration-300 hover:after:w-full">Products</a></li>
                <li class="ml-6"><a href="/categorie/show" class="no-underline text-secondary font-medium relative transition-colors duration-300 hover:text-accent after:content-[''] after:absolute after:w-0 after:h-0.5 after:bottom-[-5px] after:left-0 after:bg-accent after:transition-all after:duration-300 hover:after:w-full">Categories</a></li>
            @endif
            @endauth
            <li class="ml-6">
                <div class="mt-auto">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link onclick="event.preventDefault(); this.closest('form').submit();" class="no-underline text-secondary font-medium relative transition-colors duration-300 hover:text-accent after:content-[''] after:absolute after:w-0 after:h-0.5 after:bottom-[-5px] after:left-0 after:bg-accent after:transition-all after:duration-300 hover:after:w-full">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </li>
        </ul>
    </nav> -->

    <div class="py-12 px-5 max-w-7xl mx-auto">
        <h1 class="text-4xl text-center text-indigo-900 mb-10 relative pb-4 after:content-[''] after:absolute after:bottom-0 after:left-1/2 after:transform after:-translate-x-1/2 after:w-24 after:h-[3px] after:bg-indigo-900">Produits</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($produits as $produit)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{$produit->photo}}" alt="{{$produit->title}}" class="w-full h-64 object-cover">
                
                <div class="p-6">
                    <div class="flex justify-between items-center mb-5">
                        <h2 class="text-2xl text-indigo-900 m-0 font-semibold">{{$produit->title}}</h2>
                    </div>
                    
                    <p class="mb-4">{{$produit->description}}</p>
                    
                    <div class="mb-4">
                        <div>
                            <h4 class="font-medium">Prix: {{$produit->prix_unite}}</h4>
                        </div>
                    </div>
                    
                    <div class="flex flex-col gap-3">
                        <a href="/detailProduit/{{$produit->id}}" class="inline-block w-full py-3 px-5 bg-white text-indigo-900 text-center no-underline rounded-lg font-medium uppercase tracking-wide border-2 border-indigo-900 hover:bg-indigo-50 transition-colors duration-300">
                            <i class="fas fa-search"></i> Voir détails
                        </a>
                        
                        <a href="#" class="inline-block w-full py-3 px-5 bg-gradient-to-r from-indigo-900 to-indigo-600 text-white text-center no-underline rounded-lg font-medium uppercase tracking-wide border-0 hover:from-indigo-600 hover:to-indigo-900 transition-colors duration-300" data-bs-toggle="modal" data-bs-target="#reservationModal{{$produit->id}}" data-produits-id="{{$produit->id}}">
                            <i class="fas fa-shopping-cart"></i> Ajouter au panier
                        </a>
                    </div>
                </div>
            </div>

            <!-- Modal pour chaque produit (kept Bootstrap for modals) -->
            <div class="modal fade" id="reservationModal{{$produit->id}}" tabindex="-1" aria-labelledby="reservationModalLabel{{$produit->id}}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="reservationModalLabel{{$produit->id}}">Ajouter {{$produit->title}} au panier</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Êtes-vous sûr de vouloir ajouter ce produit au panier ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <a href="/Panier/{{$produit->id}}" class="btn btn-primary">Ajouter</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Bouton avec l'icône du panier -->
    <a href="/Panier" class="fixed bottom-5 right-5 bg-indigo-900 text-white rounded-full p-4 text-2xl shadow-lg hover:bg-indigo-600 cursor-pointer transition-colors duration-300">
        <i class="fas fa-shopping-cart"></i>
    </a>
    @endsection