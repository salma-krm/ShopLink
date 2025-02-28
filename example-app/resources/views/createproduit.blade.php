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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: #f0f2f5;
            min-height: 100vh;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 700px;
        }
        .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }
    .form-group input,
    .form-group textarea,
    .form-group select {
      width: 100%;
      padding: 8px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 14px;
    }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-header h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #444;
            font-weight: 500;
            font-size: 14px;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #e1e1e1;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        input:focus,
        textarea:focus {
            border-color: #4a90e2;
            outline: none;
            background: white;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .submit-btn {
            background: #4a90e2;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: background 0.3s ease;
        }

        .submit-btn:hover {
            background: #357abd;
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .form-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h2>Ajouter un produit</h2>
        </div>
        <form method="post" action="/produit/create">
            @csrf
            <div class="form-grid">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" placeholder="Entrez le titre du projet">
                </div>

                <div class="form-group">
                    <label>Photo</label>
                    <input name="photo" type="text" placeholder="Entrez le lien de la photo">
                </div>
                <div class="form-group">
                    <label>stock</label>
                    <input name="stock" type="number" placeholder="Entrez stock">
                </div>

                <div class="form-group">
                    <label>prix_unite</label>
                    <input name="prix_unite" type="text" placeholder="price">
                </div>

                <div class="form-group full-width">
                    <label>Description</label>
                    <textarea name="description" placeholder="Décrivez votre produits"></textarea>
                </div>
                <div class="form-group">
                <label>Catégorie</label>
                <select name="souscategorie_id">
                 @foreach ($souscategories as $souscategorie)
                    <option value="{{$souscategorie->id}}">{{$souscategorie->title}}  </option>
                 @endforeach
                </select>
              </div>
               

                <div class="form-group full-width">
                    <button type="submit" class="submit-btn">Ajouter Produits</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>