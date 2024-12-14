<?php include('database.php'); ?>
<?php
$stmt = $pdo->prepare('SELECT * FROM items');
$stmt->execute();
$items = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Trendify</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <style>
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
        .card-body {
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Manage Products</h1>

        <div class="row">
            <?php foreach($items as $item): ?>
            <div class="col-md-3" style="margin-bottom: 40px;">
            <a href="selected.php?id=<?= htmlspecialchars($item['id']) ?>">

                <div class="card" style="width: 100%;">
                    <img class="fixed-size-img" style="height: 300px;width: 100%;" src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['itemName']) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($item['itemName']) ?></h5>
                        <p class="card-text">Color: <?= htmlspecialchars($item['itemColor']) ?></p>
                        <p class="card-text">Size: <?= htmlspecialchars($item['itemSize'] ?? '') ?></p>
                        <p class="card-text">₱<?= htmlspecialchars($item['itemPrice'] ?? '') ?></p>
                        
                    </div>
                </div>
                </a>

            </div>
            <?php endforeach; ?>

            <div class="col-md-3">
                <div class="card d-flex justify-content-center align-items-center" style="width: 100%; height: 50px;border-radius: 20px;">
                    <a href="create.php" type="button" class="btn btn-success btn-lg" style="display: flex; justify-content: center; align-items: center;width: 100%; height: 50px;">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true" style="font-size: 25px;"></span> 
                    </a>
                </div>
            </div>

        </div>

    </div>
</body>
</html>
