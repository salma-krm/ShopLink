<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Panier</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Ajouter l'icône du panier avec FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f5f6fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            padding: 50px 20px;
            max-width: 1400px;
        }

        .page-title {
            color: #1a237e;
            font-size: 2.5rem;
            margin-bottom: 40px;
            position: relative;
            padding-bottom: 15px;
        }

        .page-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: #1a237e;
        }

        .cart-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
            gap: 30px;
        }

        .cart-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .cart-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .cart-content {
            padding: 25px;
        }

        .cart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .cart-title {
            font-size: 1.5rem;
            color: #1a237e;
            margin: 0;
            font-weight: 600;
        }

        .cart-price {
            font-size: 1.2rem;
            color: #ff5722;
            font-weight: 600;
        }

        .remove-btn {
            background: #ff5722;
            color: white;
            border: none;
            padding: 8px 15px;
            font-size: 0.9rem;
            border-radius: 5px;
            cursor: pointer;
        }

        .remove-btn:hover {
            background: #e64a19;
        }

        .total-container {
            background: white;
            padding: 25px;
            margin-top: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .total-price {
            font-size: 1.5rem;
            color: #1a237e;
            font-weight: 600;
        }

        .checkout-btn {
            width: 100%;
            padding: 12px 20px;
            background: linear-gradient(45deg, #1a237e, #3949ab);
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: none;
            margin-top: 20px;
        }

        .checkout-btn:hover {
            background: linear-gradient(45deg, #3949ab, #1a237e);
        }
        
        .item-total {
            margin-top: 10px;
            font-size: 1.2rem;
            color: #1a237e;
            font-weight: 600;
            border-top: 1px solid #eee;
            padding-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="page-title text-center">Mon Panier</h1>

        <!-- Conteneur des produits dans le panier -->
        <div class="cart-container">

            @foreach($panier as $id => $produit)
            <div class="cart-card">
                <div class="cart-content">
                    <div class="cart-header">
                        <h2 class="cart-title">{{ $produit['title'] }}</h2>
                        <button class="remove-btn" onclick="window.location.href='/panier/supprimer/{{ $id }}'">Supprimer</button>
                    </div>
                    <p class="cart-description">{{ $produit['description'] }}</p>
                    <div class="cart-price">
                        Prix: {{ $produit['prix_unite'] }} €
                    </div>
                    <div class="cart-quantity">
                        Quantité: {{ $produit['quantity'] }}
                    </div>
                    <div class="item-total">
                        Total: {{ number_format($produit['prix_unite'] * $produit['quantity'], 2, ',', ' ') }} €
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="total-container">
            <div class="total-price">
                Total du panier: 
                @php
                    $total = 0;
                    foreach($panier as $produit) {
                        $total += $produit['prix_unite'] * $produit['quantity'];
                    }
                    echo number_format($total, 2, ',', ' ') . ' €';
                @endphp
            </div>
            <div style="margin: 30px;">
            <a href="/Commande" class="checkout-btn">Passer pour commande</a>
            </div>
           
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>