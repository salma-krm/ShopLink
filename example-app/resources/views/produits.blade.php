<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits</title>
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

        .rooms-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
            gap: 30px;
        }

        .room-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .room-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .room-content {
            padding: 25px;
        }

        .room-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .room-title {
            font-size: 1.5rem;
            color: #1a237e;
            margin: 0;
            font-weight: 600;
        }

        .reservation-btn {
            display: inline-block;
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
        }

        .reservation-btn:hover {
            background: linear-gradient(45deg, #3949ab, #1a237e);
            color: white;
        }

        .cart-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #1a237e;
            color: white;
            border-radius: 50%;
            padding: 15px;
            font-size: 24px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            cursor: pointer;
        }

        .cart-btn:hover {
            background-color: #3949ab;
        }

        @media (max-width: 768px) {
            .rooms-container {
                grid-template-columns: 1fr;
            }

            .container {
                padding: 20px 15px;
            }

            .page-title {
                font-size: 2rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="page-title text-center">Produits</h1>
        <div class="rooms-container">
            @foreach($produits as $produit)
            <div class="room-card">
                <img src="{{$produit->photo}}" alt="{{$produit->title}}" class="room-image">
                <div class="room-content">
                    <div class="room-header">
                        <h2 class="room-title">{{$produit->title}}</h2>
                    </div>
                    <p class="room-description">{{$produit->description}}</p>
                    <div class="room-details">
                        <div class="detail-item">
                            <span>prix: {{$produit->prix_unite}} </span>
                        </div>
                        <div class="detail-item">
                            <span>stock: {{$produit->stock}}</span>
                        </div>
                    </div>
                    <div>
                        <h6>{{$produit->souscategorie->title}}</h6>
                    </div>
                    <!-- Lien avec modal, ajout de l'ID du produit -->
                    <a href="#" class="reservation-btn" data-bs-toggle="modal" data-bs-target="#reservationModal{{$produit->id}}" data-produits-id="{{$produit->id}}">
                        Ajouter au panier
                    </a>
                </div>
            </div>

            <!-- Modal pour chaque produit -->
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
    <a href="/Panier" class="cart-btn">
        <i class="fas fa-shopping-cart"></i>
    </a>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
