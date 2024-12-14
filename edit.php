<?php
include('database.php');


$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: main.php');
    exit();
}

$sql = 'SELECT * FROM items WHERE id = :id';

$stmt = $pdo->prepare($sql);

$params = ['id'=>$id];

$stmt->execute($params);

$post = $stmt->fetch();

$isPutRequest = ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['_method'] ?? '') === 'put');


if ($isPutRequest) {
    $itemName = htmlspecialchars($_POST['itemName'] ?? '');
    $image = htmlspecialchars($_POST['image'] ?? '');
    $itemColor = htmlspecialchars($_POST['itemColor'] ?? '');
    $itemSize = htmlspecialchars($_POST['itemSize'] ?? '');
    $itemPrice = htmlspecialchars($_POST['itemPrice'] ?? '');
    
    $sql = 'UPDATE items SET itemName = :itemName, image = :image, itemColor = :itemColor, itemSize = :itemSize, itemPrice = :itemPrice WHERE id = :id';

    $stmt = $pdo->prepare($sql);

    $params = [
        'itemName' => $itemName,
        'image' => $image,
        'itemColor' => $itemColor,
        'itemSize' => $itemSize, 
        'itemPrice' => $itemPrice,
        'id' => $id
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <style>
        .card {
            height: 500px;
            width: 400px;
            border-radius: 5px;
            margin: 0 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, .1);
            transition: .5s;
        }
    </style>
</head>
<body>

<div class="container-lg-3" class="form-inline">
        
        <form action="" method="Post">
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="id" value= "<?=$post['id']?>">
            <div class="col-md-3">

                <div class="form-group">
                    <label for="image">Image: </label>
                    <input type="text" id="image" name="image" class="form-control mb-3 ml-3" value= "<?=$post['image']?>">

                </div>

                <div class="form-group">
                    <label for="itemName">Product Name: </label>
                    <input type="text" id="itemName" class="form-control mb-3" name="itemName" value= "<?=$post['itemName']?>">
                    </div>

                <div class="form-group">
                    <label for="itemColor">Color: </label>
                    <input type="text" id="itemColor" class="form-control mb-3" name="itemColor" value= "<?=$post['itemColor']?>">
                    </div>
                
                <div class="form-group">
                    <label for="itemSize">Size: </label>
                    <input type="text" id="itemSize" class="form-control mb-3" name="itemSize" value= "<?=$post['itemSize']?>">
                    </div>
                
                <div class="form-group">
                    <label for="itemPrice">Prize: </label>
                    <input type="text" id="itemPrice" class="form-control" aria-label="Amount (to the nearest dollar)" name="itemPrice" value= "<?=$post['itemPrice']?>">
                    </div>
                
                    <button type="submit" value="Save" name="submit" class="btn btn-success btn-lg">
                    <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>Save
                </button>
            </div>
        </form>
    </div>

</body>
</html>