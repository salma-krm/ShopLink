<!DOCTYPE html>
<html>

<head>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">

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

    .dashboard {
      display: flex;
      min-height: 100vh;
    }

    /* Sidebar */
    .sidebar {
      width: var(--sidebar-width);
      background: #fff;
      box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
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

    /* Search Input */
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

    /* Main Content */
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

    /* Cards */
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

    /* Table */
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

    /* Button */
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

    /* Responsive Design */
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

      .no-underline-white {
        text-decoration: none;
        color: black;
      }

      .no-underline-white:hover {
        color: white;
        
      }

    }
  </style>
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
          <a href="/produit/show" class="nav-link">
            <i class="bi bi-briefcase"></i>
            <span>produit</span>
          </a>
        </div>
        <div class="nav-item">
          <a href="/categorie/show" class="nav-link">
            <span>categories</span>
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
            <i class="bi bi-search search-icon"></i>
            <input type="text" class="search-input" placeholder="Rechercher...">
          </div>
        </div>

        <!-- Dashboard Summary Cards -->
        <div class="dashboard-cards">
          <div class="card">
            <div class="card-title">reservation Totaux</div>
            <div class="card-value">24</div>
          </div>
          <div class="card">
            <div class="card-title">salle totaux</div>
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

        <button class="btn btn-primary mb-3" type="button"><a href="/createsalle" style="color: white;">Ajouter Salle</a></button>

        <!-- Salle List Table -->
        <table class="table table-striped">
          <thead>
            <tr>
              <th>name</th>
              <th>Description</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($categories as $categorie)
            <tr>
              <td>{{$categorie->name}}</td>
              <td>{{$categorie->description}}</td>
              <td class="text-end">
                <!-- Actions -->
                <button class="btn d-inline-flex " type="button"
                  data-bs-toggle="modal" data-bs-target="#editModal_">
                  <input type="hidden" name="id" value="{{$categorie->id}}">
                  <span >
                    <a href="/categorie/{{$categorie->id}}/update" class="btn btn-primary btn-sm ">edit</a>
                  </span>

                </button>
                <form method="post" action="/categorie/{{$categorie->id}}/delete" class="d-inline">
                  @csrf
                  <input type="hidden" name="id" value="{{$categorie->id}}">
                  <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i>delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <!DOCTYPE html>
<html>

<head>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">

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

    .dashboard {
      display: flex;
      min-height: 100vh;
    }

    /* Sidebar */
    .sidebar {
      width: var(--sidebar-width);
      background: #fff;
      box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
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

    /* Search Input */
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

    /* Main Content */
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

    /* Cards */
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

    /* Table */
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

    /* Button */
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

    /* Responsive Design */
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

      .no-underline-white {
        text-decoration: none;
        color: black;
      }

      .no-underline-white:hover {
        color: white;
        
      }

    }
  </style>
</head>


<html>

<head>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* ... Your existing styles ... */
  </style>
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
          <a href="/produit/show" class="nav-link">
            <i class="bi bi-briefcase"></i>
            <span>produit</span>
          </a>
        </div>
        <div class="nav-item">
          <a href="/categorie/show" class="nav-link">
            <span>categories</span>
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
            <i class="bi bi-search search-icon"></i>
            <input type="text" class="search-input" placeholder="Rechercher...">
          </div>
        </div>

        <!-- Dashboard Summary Cards -->
        <div class="dashboard-cards">
          <!-- Your summary cards here -->
        </div>

        <!-- Button to Open Add Category Modal -->
        <button class="btn btn-primary mb-3" type="button" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
          Ajouter catégorie
        </button>

        <!-- Salle List Table -->
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Name</th>
              <th>Description</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($categories as $categorie)
            <tr>
              <td>{{$categorie->name}}</td>
              <td>{{$categorie->description}}</td>
              <td class="text-end">
                <!-- Edit Button (Opens Update Modal) -->
                <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#editModal_{{$categorie->id}}">
                  Edit
                </button>
                <!-- Delete Button -->
                <form method="post" action="/categorie/{{$categorie->id}}/delete" class="d-inline">
                  @csrf
                  <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i>Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal for Adding a New Category -->
  <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addCategoryModalLabel">Ajouter une nouvelle catégorie</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/categorie/store" method="POST">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Nom de la catégorie</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal for Editing a Category (for each category) -->
  @foreach($categories as $categorie)
  <div class="modal fade" id="editModal_{{$categorie->id}}" tabindex="-1" aria-labelledby="editModalLabel_{{$categorie->id}}" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel_{{$categorie->id}}">Modifier la catégorie</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/categorie/{{$categorie->id}}/update" method="POST">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Nom de la catégorie</label>
              <input type="text" class="form-control" id="name" name="name" value="{{$categorie->name}}" required>
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea class="form-control" id="description" name="description" rows="3" required>{{$categorie->description}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>


</html>
      </div>
    </div>
  </div>
</body>

</html>