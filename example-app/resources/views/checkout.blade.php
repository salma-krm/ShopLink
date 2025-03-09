<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TechStore - Electronics E-commerce Shop</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <style>
        :root {
            --primary-blue: #1a73e8;
            --secondary-blue: #4285f4;
            --light-blue: #e8f0fe;
            --dark-blue: #0d47a1;
        }
        
        body {
            background-color: #f8f9fa;
        }
        
        .navbar {
            background-color: var(--primary-blue);
        }
        
        .card-header {
            background-color: var(--primary-blue);
            color: white;
            font-weight: bold;
        }
        
        .btn-primary {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
        }
        
        .btn-primary:hover {
            background-color: var(--dark-blue);
            border-color: var(--dark-blue);
        }
        
        .bg-light-blue {
            background-color: var(--light-blue);
        }
        
        .text-primary {
            color: var(--primary-blue) !important;
        }
        
        .checkout-btn {
            background-color: var(--primary-blue);
            color: white;
        }
        
        .checkout-btn:hover {
            background-color: var(--dark-blue);
            color: white;
        }
        
        .continue-btn {
            background-color: #f8f9fa;
            color: var(--primary-blue);
            border: 1px solid var(--primary-blue);
        }
        
        .continue-btn:hover {
            background-color: var(--light-blue);
        }
        
        .delete-btn {
            background-color: #dc3545;
        }
        
        .product-title {
            color: var(--primary-blue);
            font-weight: 600;
        }
        
        .total-section {
            font-weight: bold;
            color: var(--dark-blue);
        }
    </style>
</head>


<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">TechStore</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Deals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-shopping-cart"></i> Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-user"></i> Account</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12">
                <h1 class="text-primary">Your Shopping Cart</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        Your Selected Electronics
                    </div>
                    <div class="card-body">
                        <table id="cart" class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="width:50%">Product</th>
                                    <th style="width:10%">Price</th>
                                    <th style="width:8%">Quantity</th>
                                    <th style="width:22%" class="text-center">Subtotal</th>
                                    <th style="width:10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-th="Product">
                                        <div class="row">
                                            <div class="col-sm-3 hidden-xs">
                                                <img src="/api/placeholder/100/100" alt="Asus Vivobook 17" class="img-fluid rounded" />
                                            </div>
                                            <div class="col-sm-9">
                                                <h4 class="product-title">Asus Vivobook 17</h4>
                                                <p class="small">Intel Core i7, 16GB RAM, 512GB SSD</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Price">899,00 €</td>
                                    <td data-th="Quantity">
                                        <h4>1</h4>
                                    </td>
                                    <td data-th="Subtotal" class="text-center">899,00 €</td>
                                    <td class="actions" data-th="">
                                        <button class="btn delete-btn btn-sm text-white"><i class="fa fa-trash-o"></i> Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-th="Product">
                                        <div class="row">
                                            <div class="col-sm-3 hidden-xs">
                                                <img src="/api/placeholder/100/100" alt="Wireless Headphones" class="img-fluid rounded" />
                                            </div>
                                            <div class="col-sm-9">
                                                <h4 class="product-title">Sony WH-1000XM4</h4>
                                                <p class="small">Wireless Noise Cancelling Headphones</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Price">349,00 €</td>
                                    <td data-th="Quantity">
                                        <h4>1</h4>
                                    </td>
                                    <td data-th="Subtotal" class="text-center">349,00 €</td>
                                    <td class="actions" data-th="">
                                        <button class="btn delete-btn btn-sm text-white"><i class="fa fa-trash-o"></i> Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-end pe-4 py-3 bg-light-blue total-section">
                                        <h3>Total: 1 248,00 €</h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-end p-3">
                                        <form action="/session" method="POST">
                                            <a href="{{ url('/') }}" class="btn continue-btn me-2"> 
                                                <i class="fa fa-arrow-left"></i> Continue Shopping
                                            </a>
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <input type='hidden' name="total" value="1248">
                                            <input type='hidden' name="productname" value="Electronics Bundle">
                                            <button class="btn checkout-btn" type="submit" id="checkout-live-button">
                                                <i class="fa fa-credit-card"></i> Proceed to Checkout
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Featured Products Section -->
        <div class="row mt-5">
            <div class="col-12">
                <h2 class="text-primary mb-4">You May Also Like</h2>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="/api/placeholder/350/200" class="card-img-top" alt="Samsung Galaxy S22">
                    <div class="card-body">
                        <h5 class="product-title">Samsung Galaxy S22</h5>
                        <p class="card-text">128GB, Phantom Black</p>
                        <p class="fw-bold">799,00 €</p>
                        <button class="btn btn-primary">Add to Cart</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="/api/placeholder/350/200" class="card-img-top" alt="Apple iPad Air">
                    <div class="card-body">
                        <h5 class="product-title">Apple iPad Air</h5>
                        <p class="card-text">64GB, Wi-Fi, Space Gray</p>
                        <p class="fw-bold">599,00 €</p>
                        <button class="btn btn-primary">Add to Cart</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="/api/placeholder/350/200" class="card-img-top" alt="JBL Flip 6">
                    <div class="card-body">
                        <h5 class="product-title">JBL Flip 6</h5>
                        <p class="card-text">Portable Bluetooth Speaker, Blue</p>
                        <p class="fw-bold">129,00 €</p>
                        <button class="btn btn-primary">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="bg-dark text-white mt-5 py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>TechStore</h5>
                    <p>Your trusted electronics online store since 2010.</p>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">About Us</a></li>
                        <li><a href="#" class="text-white">Contact</a></li>
                        <li><a href="#" class="text-white">Terms & Conditions</a></li>
                        <li><a href="#" class="text-white">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contact</h5>
                    <address>
                        123 Tech Street<br>
                        Paris, 75001<br>
                        France<br>
                        Email: contact@techstore.com<br>
                        Phone: +33 1 23 45 67 89
                    </address>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 text-center">
                    <p class="mb-0">© 2025 TechStore. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>