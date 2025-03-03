<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Produits</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            min-height: 100vh;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            position: relative;
            overflow: hidden;
        }

        .form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px;
            background: linear-gradient(90deg, #4a90e2 0%, #63b3ed 100%);
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .form-header h2 {
            color: #2d3748;
            font-size: 28px;
            margin-bottom: 10px;
            position: relative;
            display: inline-block;
        }

        .form-header h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: #4a90e2;
            border-radius: 2px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
        }

        .form-group {
            margin-bottom: 5px;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #4a5568;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 14px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: #f8fafc;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #4a90e2;
            outline: none;
            background: white;
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.2);
        }

        input::placeholder,
        textarea::placeholder {
            color: #a0aec0;
        }

        textarea {
            min-height: 140px;
            resize: vertical;
        }

        select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%234a5568' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
            padding-right: 40px;
        }

        .submit-btn {
            background: linear-gradient(90deg, #4a90e2 0%, #63b3ed 100%);
            color: white;
            padding: 16px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(74, 144, 226, 0.3);
            margin-top: 10px;
        }

        .submit-btn:hover {
            background: linear-gradient(90deg, #357abd 0%, #4a90e2 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(74, 144, 226, 0.4);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .input-icon-container {
            position: relative;
        }

        .input-icon {
            position: absolute;
            top: 50%;
            left: 14px;
            transform: translateY(-50%);
            color: #a0aec0;
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }
            
            .form-container {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h2>Ajouter un produit</h2>
            <p style="color: #718096; margin-top: 20px;">Remplissez le formulaire pour ajouter un nouveau produit à votre catalogue</p>
        </div>
        <form method="post" action="/produit/create">
            @csrf
            <div class="form-grid">
                <div class="form-group">
                    <label for="title">Titre du produit</label>
                    <input type="text" id="title" name="title" placeholder="Entrez le titre du produit" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="photo">URL de la photo</label>
                    <input id="photo" name="photo" type="text" placeholder="Entrez le lien de la photo">
                </div>
                
                <div class="form-group">
                    <label for="stock">Stock disponible</label>
                    <input id="stock" name="stock" type="number" min="0" placeholder="Quantité en stock">
                </div>

                <div class="form-group">
                    <label for="prix_unite">Prix unitaire</label>
                    <input id="prix_unite" name="prix_unite" type="text" placeholder="Prix par unité">
                </div>

                <div class="form-group full-width">
                    <label for="description">Description du produit</label>
                    <textarea id="description" name="description" placeholder="Décrivez les caractéristiques et avantages de votre produit"></textarea>
                </div>
                
                <div class="form-group full-width">
                    <label for="souscategorie_id">Catégorie</label>
                    <select id="souscategorie_id" name="souscategorie_id">
                        @foreach ($souscategories as $souscategorie)
                            <option value="{{$souscategorie->id}}">{{$souscategorie->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group full-width">
                    <button type="submit" class="submit-btn">
                        Ajouter le produit
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>