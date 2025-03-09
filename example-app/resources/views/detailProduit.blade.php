@extends('navfooter')
@section('content')
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Produit</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  
</head>

<body class="bg-[#f5f6fa] font-sans">
    <div class="container mx-auto px-5 py-12 lg:py-12 max-w-7xl">
        <h1 class="text-indigo-900 text-4xl lg:text-5xl mb-10 relative pb-4 text-center font-bold after:content-[''] after:absolute after:bottom-0 after:left-1/2 after:-translate-x-1/2 after:w-24 after:h-0.5 after:bg-indigo-900">Détails du Produit</h1>

        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
            <div class="lg:flex">
                <div class="lg:w-1/2">
                    <div class="h-[400px] overflow-hidden lg:h-full">
                        <img src="{{$produit->photo}}" alt="{{$produit->title}}" class="w-full h-full object-cover">
                    </div>
                </div>
               
                <div class="lg:w-1/2">
                    <div class="p-6 lg:p-8">
                        <h2 class="text-3xl text-indigo-900 mb-5 font-semibold">{{$produit->title}}</h2>
                        <span class="inline-block bg-indigo-50 text-indigo-900 px-4 py-1 rounded-full text-sm mb-5">{{$produit->souscategorie->title}}</span>
                        <div class="text-2xl text-indigo-900 font-bold mb-5">{{$produit->prix_unite}} €</div>

                        @if($produit->stock > 10)
                        <div class="text-green-500 mb-5">
                            <i class="fas fa-check-circle"></i> En stock ({{$produit->stock}} disponibles)
                        </div>
                        @elseif($produit->stock > 0)
                        <div class="text-amber-500 mb-5">
                            <i class="fas fa-exclamation-circle"></i> Stock limité ({{$produit->stock}} restants)
                        </div>
                        @else
                        <div class="text-red-500 mb-5">
                            <i class="fas fa-times-circle"></i> Rupture de stock
                        </div>
                        @endif

                        <div class="mb-8">
                            <p class="leading-7">{{$produit->description}}</p>
                        </div>

                        <div class="mb-8">
                            <h3 class="text-xl text-indigo-900 mb-4 font-semibold">Caractéristiques</h3>
                            <ul class="list-none p-0">
                                @if(isset($produit->caracteristiques) && count($produit->caracteristiques) > 0)
                                @foreach($produit->caracteristiques as $caracteristique)
                                <li class="py-2 border-b border-gray-200 last:border-b-0">{{$caracteristique->nom}}: {{$caracteristique->valeur}}</li>
                                @endforeach
                                @else
                                <li class="py-2 border-b border-gray-200">Sous-catégorie: {{$produit->souscategorie->title}}</li>
                                <li class="py-2">Référence: {{$produit->reference ?? 'REF-' . $produit->id}}</li>
                                @endif
                            </ul>
                        </div>

                        <div class="flex items-center mb-8">
                            <button class="w-10 h-10 bg-indigo-50 rounded-full flex items-center justify-center text-xl cursor-pointer" onclick="decrementQuantity()">-</button>
                            <input type="number" class="w-16 h-10 mx-3 text-center border border-gray-200 rounded" id="quantity" value="1" min="1" max="{{$produit->stock}}">
                            <button class="w-10 h-10 bg-indigo-50 rounded-full flex items-center justify-center text-xl cursor-pointer" onclick="incrementQuantity()">+</button>
                        </div>

                        <div>
                            <a href="/Panier/{{$produit->id}}" class="inline-block px-8 py-4 bg-gradient-to-r from-indigo-900 to-indigo-700 text-white text-center rounded-lg font-medium uppercase tracking-wide mr-4 hover:from-indigo-700 hover:to-indigo-900" data-bs-toggle="modal" data-bs-target="#addToCartModal" data-produits-id="{{$produit->id}}">
                                <i class="fas fa-shopping-cart mr-2"></i> Ajouter au panier
                            </a>
                            <a href="/produits" class="inline-block px-8 py-4 bg-indigo-50 text-indigo-900 text-center rounded-lg font-medium tracking-wide border border-indigo-900 hover:bg-indigo-100">
                                <i class="fas fa-arrow-left mr-2"></i> Retour aux produits
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal pour ajouter au panier -->
    <div id="addToCartModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg max-w-md w-full mx-4">
            <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                <h5 class="text-lg font-medium">Ajouter {{$produit->title}} au panier</h5>
                <button type="button" class="text-gray-400 hover:text-gray-500" onclick="document.getElementById('addToCartModal').classList.add('hidden')">
                    <span class="sr-only">Close</span>
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="p-4">
                <p>Êtes-vous sûr de vouloir ajouter <span id="quantityDisplay">1</span> exemplaire(s) de ce produit au panier ?</p>
            </div>
            <div class="p-4 bg-gray-50 flex justify-end space-x-2">
                <button type="button" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300" onclick="document.getElementById('addToCartModal').classList.add('hidden')">Fermer</button>
                <a href="/Panier/{{$produit->id}}?quantity=" id="confirmAddToCart" class="px-4 py-2 bg-indigo-900 text-white rounded hover:bg-indigo-700">Ajouter</a>
            </div>
        </div>
    </div>

    <!-- Bouton avec l'icône du panier -->
    <a href="/Panier" class="fixed bottom-5 right-5 bg-indigo-900 text-white rounded-full p-4 text-2xl shadow-lg hover:bg-indigo-700">
        <i class="fas fa-shopping-cart"></i>
    </a>

    <script>
        function incrementQuantity() {
            const quantityInput = document.getElementById('quantity');
            const currentValue = parseInt(quantityInput.value);
            const maxValue = parseInt(quantityInput.getAttribute('max'));
            
            if (currentValue < maxValue) {
                quantityInput.value = currentValue + 1;
                updateQuantityDisplay();
            }
        }

        function decrementQuantity() {
            const quantityInput = document.getElementById('quantity');
            const currentValue = parseInt(quantityInput.value);
            
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
                updateQuantityDisplay();
            }
        }
        
        function updateQuantityDisplay() {
            const quantity = document.getElementById('quantity').value;
            document.getElementById('quantityDisplay').textContent = quantity;
            
            // Mettre à jour l'URL pour l'ajout au panier
            const confirmBtn = document.getElementById('confirmAddToCart');
            const productId = confirmBtn.href.split('/').pop().split('?')[0];
            confirmBtn.href = `/Panier/${productId}?quantity=${quantity}`;
        }
        
        // Initialisation
        document.addEventListener('DOMContentLoaded', function() {
            updateQuantityDisplay();
            
            // Modal handling
            const modalTriggers = document.querySelectorAll('[data-bs-toggle="modal"]');
            modalTriggers.forEach(trigger => {
                trigger.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetModal = document.getElementById(this.getAttribute('data-bs-target').substring(1));
                    if (targetModal) {
                        targetModal.classList.remove('hidden');
                    }
                });
            });
        });
    </script>
   @endsection