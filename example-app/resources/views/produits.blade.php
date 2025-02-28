<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
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

        .status-badge {
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
            background-color: #4caf50;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .room-description {
            color: #546e7a;
            line-height: 1.6;
            margin-bottom: 20px;
            font-size: 1rem;
        }

        .room-details {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #37474f;
            margin-bottom: 10px;
        }

        .detail-item:last-child {
            margin-bottom: 0;
        }

        .icon {
            width: 20px;
            height: 20px;
            color: #1a237e;
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

        .modal-content {
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            background: #1a237e;
            color: white;
            border-radius: 10px 10px 0 0;
            padding: 20px;
        }

        .modal-title {
            font-weight: 600;
            color: white;
        }

        .modal-body {
            padding: 25px;
        }

        .form-label {
            color: #37474f;
            font-weight: 500;
        }

        .form-control {
            border-radius: 6px;
            padding: 12px;
            border: 1px solid #e0e0e0;
        }

        .form-control:focus {
            border-color: #1a237e;
            box-shadow: 0 0 0 0.2rem rgba(26, 35, 126, 0.25);
        }

        .modal-footer {
            padding: 20px;
            border-top: 1px solid #e0e0e0;
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
                    <a href="#" data-bs-toggle="modal" data-bs-target="#reservationModal{{$produit->id}}" class="reservation-btn">
                        commande maintenant
                    </a>
                </div>
            </div>

           
            @endforeach
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>