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
      <div class="content-frame">
        <div class="header">
          <h1>Tableau de bord</h1>
          <div class="search-container">
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

        <!-- Button to trigger create modal -->
        <button class="btn btn-primary mb-3" type="button" data-bs-toggle="modal" data-bs-target="#createModal">Ajouter Categorie</button>

        <!-- Salle List Table -->
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Description</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($categories as $categorie)
            <tr>
              <td>{{$categorie->id}}</td>
              <td>{{$categorie->name}}</td>
              <td>{{$categorie->description}}</td>
              <td class="text-end">
                <div style="display: flex;">
                  <!-- Update button triggers update modal -->
                  <button class="btn btn-sm btn-outline-primary action-btn m-2" data-bs-toggle="modal" data-bs-target="#updateModal-{{$categorie->id}}">
                    <i class="bi bi-pencil-fill"></i>
                  </button>
                  <form method="post" action="/categorie/delete/{{$categorie->id}}" class="d-inline m-2">
                    @csrf
                    <input type="hidden" name="id" value="{{$categorie->id}}">
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
    </div>
  </div>

  <!-- Create Modal (Ajout Categorie) -->
  <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createModalLabel">Ajouter une catégorie</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" action="/categorie/create">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label for="name" class="form-label">Nom</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-primary">Ajouter</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Update Modal (Modifier Categorie) -->
  @foreach($categories as $categorie)
  <div class="modal fade" id="updateModal-{{$categorie->id}}" tabindex="-1" aria-labelledby="updateModalLabel-{{$categorie->id}}" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateModalLabel-{{$categorie->id}}">Modifier la catégorie</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" action="/categorie/update/{{$categorie->id}}">
          @csrf
          <input type="hidden" value="{{$categorie->id}}">
          <div class="modal-body">
            <div class="mb-3">
              <label for="name" class="form-label">Nom</label>
              <input type="text" class="form-control" id="name" name="name" value="{{$categorie->name}}" required>
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea class="form-control" id="description" name="description" rows="3" required>{{$categorie->description}}</textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-primary">Modifier</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endforeach

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
