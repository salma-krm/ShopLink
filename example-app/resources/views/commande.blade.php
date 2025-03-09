<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement - Finaliser la Commande</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f7f9fc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #2c3e50;
        }

        .container {
            padding: 50px 20px;
            max-width: 1400px;
        }

        .page-title {
            color: #1e40af;
            font-size: 2.5rem;
            margin-bottom: 40px;
            position: relative;
            padding-bottom: 15px;
            font-weight: 700;
        }

        .page-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: #3b82f6;
        }

        .checkout-container {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
        }

        .form-section, .order-summary {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            padding: 30px;
            border: 1px solid #e5e7eb;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            color: #1e40af;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-control {
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25);
        }

        .order-summary-title {
            color: #1e40af;
            font-size: 1.5rem;
            margin-bottom: 25px;
            font-weight: 700;
            position: relative;
            padding-bottom: 15px;
            border-bottom: 2px solid #bfdbfe;
        }

        .order-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e5e7eb;
        }

        .order-item-details {
            display: flex;
            align-items: center;
            width: 40%;
        }

        .order-item-image {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 15px;
            border: 1px solid #e5e7eb;
            padding: 3px;
            background: white;
        }

        .order-item-name {
            font-weight: 600;
            color: #1e3a8a;
        }

        .order-item-price {
            color: #1e40af;
            font-weight: 600;
        }
        
        .order-item-quantity {
            font-weight: 600;
            color: white;
            margin: 0 10px;
            background: #3b82f6;
            padding: 3px 12px;
            border-radius: 20px;
            font-size: 0.9rem;
        }

        .order-item-subtotal {
            font-weight: 600;
            color: #1e40af;
        }

        .order-total {
            display: flex;
            justify-content: space-between;
            font-weight: 700;
            color: #1e40af;
            margin-top: 20px;
            padding-top: 15px;
            border-top: 2px solid #bfdbfe;
            font-size: 1.2rem;
        }

        .submit-btn {
            width: 100%;
            padding: 14px 20px;
            background: linear-gradient(to right, #1e40af, #3b82f6);
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            border: none;
            margin-top: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(59, 130, 246, 0.3);
        }

        .submit-btn:hover {
            background: linear-gradient(to right, #1e3a8a, #1e40af);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(59, 130, 246, 0.4);
        }

        .free-shipping {
            color: #16a34a;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .checkout-container {
                grid-template-columns: 1fr;
            }
            
            .order-item {
                flex-wrap: wrap;
            }
            
            .order-item-details {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="page-title text-center">Finaliser la Commande</h1>

        <div class="checkout-container">
            <!-- Formulaire de livraison et de paiement -->
            <div class="form-section">
                <h2 class="order-summary-title">Informations de Livraison</h2>
                <form method="post" action="/Commandecreate">
                    @csrf
                    <div class="form-group">
                        <label for="nom" class="form-label">Nom Complet</label>
                        <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div> 
                    <div class="form-group">
                        <label for="adresse" class="form-label">pays</label>
                        <input type="text" class="form-control" id="pays" name="pays" required>
                    </div>
                    <div class="form-group">
                        <label for="adresse" class="form-label">Adresse de Livraison</label>
                        <input type="text" class="form-control" id="address" name="adress" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="ville" class="form-label">Ville</label>
                            <input type="text" class="form-control" id="ville" name="ville" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="code-postal" class="form-label">Code Postal</label>
                            <input type="text" class="form-control" id="codepostal" name="codepostal" required>
                        </div>
                    </div>

                    <button type="submit" class="submit-btn">Confirmer la commande</button>
                </form>
            </div>

            <!-- Résumé de la commande -->
            <div class="order-summary">
                <h2 class="order-summary-title">Résumé de la Commande</h2>
                
                @foreach($pannier as $id => $produit)
                <div class="order-item">
                    <div class="order-item-details">
                        @if(isset($produit['photo']))
                            <img src="{{ $produit['photo'] }}" alt="{{ $produit['title'] }}" class="order-item-image">
                        @endif
                        <span class="order-item-name">{{ $produit['title'] }}</span>
                    </div>
                    <span class="order-item-price">{{ $produit['prix_unite'] }} €</span>
                    <span class="order-item-quantity">{{ $produit['quantity'] }}</span>
                    <span class="order-item-subtotal">
                        {{ number_format($produit['prix_unite'] * $produit['quantity'], 2, ',', ' ') }} €
                    </span>
                </div>
                @endforeach

                <div class="order-item">
                    <span>Frais de Livraison</span>
                    <span class="free-shipping">Gratuit</span>
                </div>
                
                <div class="order-total">
                    <span>Total TTC</span>
                    <span>
                        @php
                            $total = 0;
                            foreach($pannier as $produit) {
                                $total += $produit['prix_unite'] * $produit['quantity'];
                            }
                            echo number_format($total, 2, ',', ' ') . ' €';
                        @endphp
                    </span>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>