<!DOCTYPE html>
<html>

<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/app.css">
    <style>
        :root {
            --sidebar-width: 250px;
            --header-height: 60px;
            --primary-color: rgb(26, 126, 49);
            --primary-dark: rgb(26, 126, 49);
            --secondary-color: #f1f1f1;
            --text-color: rgb(0, 0, 0);
            --hover-color: #e0f7fa;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f4f7fb;
            font-size: 16px;
        }

        .status {
            padding: 5px 10px;
            border-radius: 5px;
            color: green;
            font-weight: bold;
        }

        .status.Pending {
            background-color: #f39c12 !important;
        }

        .status.Confirmed {
            background-color: #2ecc71 !important;
        }

        .status.Cancelled {
            background-color: #e74c3c !important;
        }

        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: var(--sidebar-width);
            background: #fff;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.12);
            position: fixed;
            height: 100vh;
            padding-top: 20px;
            padding-right: 10px;
        }

        .logo {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 20px;
            text-align: center;
        }

        .nav-item {
            margin-bottom: 10px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 12px;
            color: var(--text-color);
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background-color: var(--hover-color);
            color: var(--primary-color);
        }

        .nav-link.active {
            background-color: var(--primary-color);
            color: white;
        }

        .nav-link i {
            margin-right: 10px;
        }

        .search-container {
            position: relative;
            width: 300px;
        }

        .search-input {
            width: 100%;
            padding: 12px 20px;
            border-radius: 25px;
            border: 2px solid #ddd;
            font-size: 14px;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }

        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
            width: 100%;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-title {
            font-size: 18px;
            color: var(--text-color);
        }

        .card-value {
            font-size: 28px;
            color: var(--primary-color);
            font-weight: bold;
        }

        table {
            width: 100%;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin-top: 30px;
            overflow: hidden;
        }

        table thead {
            background-color: var(--primary-color);
            color: white;
        }

        table td,
        table th {
            padding: 12px;
            text-align: center;
        }

        .btn {
            border-radius: 5px;
            padding: 8px 16px;
            font-weight: 500;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                padding: 10px;
            }

            .logo {
                font-size: 22px;
            }

            .nav-link span {
                display: none;
            }

            .main-content {
                margin-left: 70px;
            }

            .search-container {
                width: 250px;
            }

            .dashboard-cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="dashboard">
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
                        <span>commande</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="/produit/show" class="nav-link">
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

        <div class="main-content">
            <div class="header">
                <h1>Tableau de bord</h1>
                <div class="search-container">
                    <i class="bi bi-search search-icon"></i>
                    <input type="text" class="search-input" placeholder="Rechercher...">
                </div>
            </div>

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

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>title</th>
                        <th>description</th>
                        <th>photo</th>
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
                        <td>{{$produit->photo}}</td>
                        <td>{{$produit->prix_unite}}</td>
                        <td>{{$produit->stock}}</td>
                        <td>{{$produit->souscategorie->title}}</td>
                        <td class="text-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal">
                                Update
                            </button>
                            <form method="post" action="" class="d-inline">
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Update Modal -->
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: rgb(26, 126, 49); color: white;">
                        <h5 class="modal-title" id="updateModalLabel">Modifier Produit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="updateProductForm" action="#" method="post" enctype="multipart/form-data">
                            <input type="hidden" id="product_id" name="id">
                            <div class="mb-3">
                                <label for="title" class="form-label">Titre</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="prix_unite" class="form-label">Prix Unitaire</label>
                                    <div class="input-group">
                                        <span class="input-group-text">€</span>
                                        <input type="number" class="form-control" id="prix_unite" name="prix_unite" step="0.01" min="0" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="stock" class="form-label">Stock</label>
                                    <input type="number" class="form-control" id="stock" name="stock" min="0" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="souscategorie_id" class="form-label">Sous-Catégorie</label>
                                <select class="form-select" id="souscategorie_id" name="souscategorie_id" required>
                                    <option value="1">Électronique</option>
                                    <option value="2">Vêtements</option>
                                    <option value="3">Alimentation</option>
                                    <option value="4">Maison</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="photo" class="form-label">Photo</label>
                                <input type="file" class="form-control" id="photo" name="photo">
                                <div class="form-text" id="current_photo"></div>
                            </div>
                            <div class="d-flex justify-content-end gap-2">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary" style="background-color: rgb(26, 126, 49);">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const updateButtons = document.querySelectorAll('[data-bs-toggle="modal"]');
                updateButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const row = this.closest('tr');
                        const id = row.cells[0].textContent;
                        const title = row.cells[1].textContent;
                        const description = row.cells[2].textContent;
                        const photo = row.cells[3].textContent;
                        const prix_unite = row.cells[4].textContent;
                        const stock = row.cells[5].textContent;
                        const souscategorie = row.cells[6].textContent;

                        document.getElementById('product_id').value = id;
                        document.getElementById('title').value = title;
                        document.getElementById('description').value = description;
                        document.getElementById('prix_unite').value = prix_unite;
                        document.getElementById('stock').value = stock;
                        document.getElementById('current_photo').textContent = `Photo actuelle: ${photo}`;

                        const select = document.getElementById('souscategorie_id');
                        for (let i = 0; i < select.options.length; i++) {
                            if (select.options[i].textContent === souscategorie) {
                                select.selectedIndex = i;
                                break;
                            }
                        }
                    });
                });
            });
        </script>
    </div>
</body>

</html>
