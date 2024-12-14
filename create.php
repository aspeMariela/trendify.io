<?php
include('database.php');

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $itemName = htmlspecialchars($_POST['itemName'] ?? '');
    $image = htmlspecialchars($_POST['image'] ?? '');
    $itemColor = htmlspecialchars($_POST['itemColor'] ?? '');
    $itemSize = htmlspecialchars($_POST['itemSize'] ?? '');
    $itemPrice = htmlspecialchars($_POST['itemPrice'] ?? '');

    $sql = 'INSERT INTO items(itemName, image, itemColor, itemSize, itemPrice) VALUES (:itemName, :image, :itemColor, :itemSize, :itemPrice)';

    $stmt = $pdo->prepare($sql);

    $params = [
        'itemName' => $itemName,
        'image' => $image,
        'itemColor' => $itemColor,
        'itemSize' => $itemSize,
        'itemPrice' => $itemPrice
    ];

    $stmt->execute($params);

    header('Location: main.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-lg-3" class="form-inline">
        
        <form action="" method="post">
            <div class="col-md-3">

                <div class="form-group">
                    <label for="exampleInputName2">Image: </label>
                    <input type="text" id="image" name="image" class="form-control mb-3 ml-3" placeholder="Enter image url">
                </div>

                <div class="form-group">
                    <label for="exampleInputName2">Product Name: </label>
                    <input type="text" id="itemName" class="form-control mb-3" placeholder="Enter Item Name" name="itemName">
                </div>

                <div class="form-group">
                    <label for="exampleInputName2">Color: </label>
                    <input type="text" id="itemColor" class="form-control mb-3" placeholder="Enter Item Color" name="itemColor">
                </div>
                
                <div class="form-group">
                    <label for="exampleInputName2">Size: </label>
                    <input type="text" id="itemSize" class="form-control mb-3" placeholder="Enter Item Size" name="itemSize">
                </div>
                
                <div class="form-group">
                    <label for="exampleInputName2">Prize: </label>
                    <input type="text" id="itemPrice" class="form-control" placeholder="Enter Item Price" aria-label="Amount (to the nearest dollar)" name="itemPrice">
                </div>
                
                <button type="submit" value="Add" name="submit" class="btn btn-success btn-lg">
                    <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> Add Items
                </button>
            </div>
        </form>
    </div>
</body>
</html>
