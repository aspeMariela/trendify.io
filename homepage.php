<?php
include('database.php');

$stmt = $pdo->prepare('SELECT * FROM items');
$stmt->execute();
$items = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trendify</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/lightbox.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>
        html {
            scroll-behavior: smooth;
        }
        .product-card {
            margin: 20px 0;
        }
        .navbar-nav .nav-link {
            font-size: 1.5rem;
        }
        .navbar {
            z-index: 1000;
            position: fixed;
            width: 100%;
            top: 0;
        }
        .container-fluid {
            margin-top: 0;
            padding-top: 0;
        }
        .carousel-item img {
            width: 100%;
            height: auto;
        }
        body {
            padding-top: 0px;
        }
        .card {
            height: 450px;
            width: 400px;
            border-radius: 5px;
            margin: 0 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, .1);
            transition: .5s;
        }
        .card:hover {
            transform: scale(1.1);
            z-index: 1;
        }
        #product {
            padding-top: 30px;
        }
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            height: 80%;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }
        .popup-close {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><h1>Trendify</h1></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#product">Products</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php">Sign out</a></li>
                <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid p-0" id="home">
        <div class="row">
            <div class="col-md-12">
                <div id="slider" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider" data-slide-to="0" class="active"></li>
                        <li data-target="#slider" data-slide-to="1"></li>
                        <li data-target="#slider" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="image/Home.png" class="d-block w-100" alt="Home">
                        </div>
                        <div class="carousel-item">
                            <img src="image/About.png" class="d-block w-100" alt="About">
                        </div>
                        <div class="carousel-item">
                            <img src="image/Us.png" class="d-block w-100" alt="Us">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div id="product">
        <div class="container my-5">
            <h1 class="text-center page-header">Products</h1>
            <div class="row">
                <?php foreach($items as $item): ?>
                <div class="col-md-3 product-card">
                    <div class="card" style="width: 100%;">
                        <img class="fixed-size-img" style="height: 300px; width: 100%;" src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['itemName']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($item['itemName']) ?></h5>
                            <p class="card-text">Color: <?= htmlspecialchars($item['itemColor']) ?></p>
                            <p class="card-text">Size: <?= htmlspecialchars($item['itemSize'] ?? '') ?></p>
                            <p class="card-text">₱<?= htmlspecialchars($item['itemPrice'] ?? '') ?></p>
                            <a href="cart.php?id=<?= htmlspecialchars($item['id']) ?>" class="btn btn-primary btn-block">Add to Cart</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
            <div class="col-12 col-md"><small class="d-block mb-3 text-muted">© 2024-2025</small></div>
            <div class="col-6 col-md">
                <h5>Features</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Cool stuff</a></li>
                    <li><a class="text-muted" href="#">Random feature</a></li>
                    <li><a class="text-muted" href="#">Team feature</a></li>
                    <li><a class="text-muted" href="#">Stuff for developers</a></li>
                    <li><a class="text-muted" href="#">Another one</a></li>
                    <li><a class="text-muted" href="#">Last time</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Resources</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Resource</a></li>
                    <li><a class="text-muted" href="#">Resource name</a></li>
                    <li><a class="text-muted" href="#">Another resource</a></li>
                    <li><a class="text-muted" href="#">Final resource</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>About</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Team</a></li>
                    <li><a class="text-muted" href="#">Locations</a></li>
                    <li><a class="text-muted" href="#">Privacy</a></li>
                    <li><a class="text-muted" href="#">Terms</a></li>
                </ul>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
