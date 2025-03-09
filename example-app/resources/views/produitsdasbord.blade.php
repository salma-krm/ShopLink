<!DOCTYPE html>
<html>

<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>

<body>
    <div class="dashboard">
        <!-- Sidebar Navigation -->
        <div class="sidebar">
            <div class="logo">Dashboard</div>
            <nav>
                <div class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="bi bi-house-door"></i>
                        <span>Tableau de bord</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="/commande/show" class="nav-link">
                        <i class="bi bi-briefcase"></i>
                        <span>commandes</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="/produits/show" class="nav-link">
                        <i class="bi bi-briefcase"></i>
                        <span>produit</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="/categorie/show" class="nav-link">
                        <span>categorie</span>
                    </a>
                </div>
            </nav>
        </div>

        <!-- Main Content Area -->
        <div class="main-content">
            <div class="header">
                <h1>Tableau de bord</h1>
                <div class="search-container">
                    <!-- <i class="bi bi-search search-icon"></i> -->
                    <input type="text" class="search-input" placeholder="Rechercher...">
                </div>
            </div>

            <!-- Dashboard Cards -->
            <div class="dashboard-cards">
                <div class="card">
                    <div class="card-title">produits Totales</div>
                    <div class="card-value">24</div>
                </div>
                <div class="card">
                    <div class="card-title">categorie Totales</div>
                    <div class="card-value">12</div>
                </div>
                <div class="card">
                    <div class="card-title">Nouveaux Avis</div>
                    <div class="card-value">3</div>
                </div>
                <div class="card">
                    <div class="card-title">Notifications</div>
                    <div class="card-value">5</div>
                </div>
            </div>
            <button class="btn btn-primary mb-3" type="button"><a href="/produits/create" style="color: white;">Ajouter Produits</a></button>
            <!-- produits Table -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>title</th>
                        <th>description</th>
                        <!-- <th>photo</th> -->
                        <th>prix_unite</th>
                        <th>stock</th>
                        <th>sousCategorie</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produits as $produit)
                    <tr>
                        <td>{{$produit->id}}</td>
                        <td>{{$produit->title}}</td>
                        <td>{{$produit->description}}</td>
                        <!-- <td>{{$produit->photo}}</td> -->
                        <td>{{$produit->prix_unite}} €</td>
                        <td>{{$produit->stock}}</td>
                        <td>{{$produit->souscategorie->title}}</td>

                        <td class="text-end">
                            <div style="display: flex;  " class="action-buttons ">
                                <button class="btn btn-sm btn-outline-primary action-btn m-2" data-bs-toggle="modal" data-bs-target="#updateModal-{{$produit->id}}">
                                    <i class="bi bi-pencil-fill"></i>
                                </button>
                                <form method="post" action="/produit/{{$produit->id}}/delete" class="d-inline m-2">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$produit->id}}">
                                    <button class="btn btn-sm btn-outline-danger action-btn">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Individual Update Modal for Each Product -->
        @foreach($produits as $produit)
        <div class="modal fade" id="updateModal-{{$produit->id}}" tabindex="-1" aria-labelledby="updateModalLabel-{{$produit->id}}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #1a237e; color: white;">
                        <h5 class="modal-title" id="updateModalLabel-{{$produit->id}}">Modifier Produit: {{$produit->title}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="updateProductForm-{{$produit->id}}" action="/produit/edit/{{$produit->id}}" method="post" enctype="multipart/form-data">
                            @csrf


                            <div class="mb-3">
                                <label for="title-{{$produit->id}}" class="form-label">Titre</label>
                                <input type="text" class="form-control" id="title-{{$produit->id}}" name="title" value="{{$produit->title}}" required>
                            </div>

                            <div class="mb-3">
                                <label for="description-{{$produit->id}}" class="form-label">Description</label>
                                <textarea class="form-control" id="description-{{$produit->id}}" name="description" rows="3" required>{{$produit->description}}</textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="prix_unite-{{$produit->id}}" class="form-label">Prix Unitaire</label>
                                    <div class="input-group">
                                        <span class="input-group-text">€</span>
                                        <input type="number" class="form-control" id="prix_unite-{{$produit->id}}" name="prix_unite" step="0.01" min="0" value="{{$produit->prix_unite}}" required>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="stock-{{$produit->id}}" class="form-label">Stock</label>
                                    <input type="number" class="form-control" id="stock-{{$produit->id}}" name="stock" min="0" value="{{$produit->stock}}" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="souscategorie_id-{{$produit->id}}" class="form-label">Sous-Catégorie</label>
                                <select class="form-select" id="souscategorie_id-{{$produit->id}}" name="souscategorie_id" required>
                                    @foreach($souscategories as $souscategorie)
                                    <option value="{{$souscategorie->id}}" {{ $produit->souscategorie_id == $souscategorie->id ? 'selected' : '' }}>
                                        {{$souscategorie->title}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="photo-url-{{$produit->id}}" class="form-label">Photo URL</label>
                                <input type="url" class="form-control" id="photo-url-{{$produit->id}}" name="photo_url" placeholder="Enter URL for the product photo" value="{{ $produit->photo ? asset('storage/'.$produit->photo) : '' }}">
                            </div>
                            @if($produit->photo)
                            <p>Photo actuelle: {{ $produit->photo }}</p>

                            @endif
                    </div>

                    <div class="d-flex justify-content-end gap-2 m-4">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary" style="background-color: #1a237e;">Enregistrer</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach


    </div>

    <!-- Bootstrap JS (for Modal functionality) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>