<?php
include('database.php');
session_start();

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM items WHERE id = :id");
    $stmt->execute([':id' => $_GET['id']]);
    $item = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($item) {
        $session_array = array(
            'id' => $item['id'],
            'itemName' => $item['itemName'],
            'itemSize' => $item['itemSize'],
            'itemColor' => $item['itemColor'],
            'itemPrice' => $item['itemPrice'],
            'image' => $item['image']
        );

        if (isset($_SESSION['cart'])) {
            $session_array_id = array_column($_SESSION['cart'], "id");

            if (!in_array($item['id'], $session_array_id)) {
                $_SESSION['cart'][] = $session_array;
            }
        } else {
            $_SESSION['cart'][] = $session_array;
        }

        $stmt = $pdo->prepare("INSERT INTO cart_item (id, itemName, itemSize, itemColor, itemPrice, image) VALUES (:id, :itemName, :itemSize, :itemColor, :itemPrice, :image)");
        $stmt->execute([
            ':id' => $item['id'],
            ':itemName' => $item['itemName'],
            ':itemSize' => $item['itemSize'],
            ':itemColor' => $item['itemColor'],
            ':itemPrice' => $item['itemPrice'],
            ':image' => $item['image']
        ]);
    }
}

$isDeleteRequest = ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['_method'] ?? '') === 'delete');
if ($isDeleteRequest) {
    $id = $_POST['id'];
    $sql = 'DELETE FROM cart_item WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);

    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $id) {
            unset($_SESSION['cart'][$key]);
        }
    }
    $_SESSION['cart'] = array_values($_SESSION['cart']);
    header('Location: cart.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>My Cart</title>
    <style>
        .card {
            height: 550px;
            border-radius: 5px;
            margin: 0 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, .1);
            transition: .5s;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <h2 class="text-center">My Cart</h2>
        <div class="row">
            <?php
            if (!empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $post) {
                    $image = htmlspecialchars($post['image'] ?? '');
                    $itemName = htmlspecialchars($post['itemName'] ?? 'Unknown Item');
                    $itemColor = htmlspecialchars($post['itemColor'] ?? 'Unknown Color');
                    $itemSize = htmlspecialchars($post['itemSize'] ?? 'Unknown Size');
                    $itemPrice = htmlspecialchars($post['itemPrice'] ?? 'Unknown Price');
            ?>
                    <div class="col-md-3">
                        <div class="card" style="width: 100%;">
                            <div class="image-container">
                                <img src="<?= $image ?>" alt="<?= $itemName ?>" class="card-img-top fixed-size-img" style="height: 300px;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?= $itemName ?></h5>
                                <p class="card-text">Color: <?= $itemColor ?></p>
                                <p class="card-text">Size: <?= $itemSize ?></p>
                                <p class="card-text">Price: ₱<?= $itemPrice ?></p>
                            </div>
                            <div class="card-footer">
                                <form action="cart.php" method="post" class="delete-form">
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($post['id']) ?>">
                                    <button type="submit" value="Delete" name="submit" class="btn btn-warning">Remove</button>
                                </form>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>Your cart is empty</p>";
            }
            ?>
        </div>
        <a href="homepage.php" class="btn btn-primary mt-3"><span class="glyphicon glyphicon-triangle-left"></span> Back to Homepage</a>
    </div>
</body>
</html>
