<?php

include('database.php');

$id = $_GET['id'] ?? null;

if(!$id) {
    header('Location: main.php');
    exit();
}

$sql = 'SELECT * FROM items WHERE id = :id';

$stmt = $pdo->prepare($sql);

$params = ['id'=>$id];


$stmt->execute($params);

$post = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selected Document</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <style>
        .card {
            height: 500px;
            width: 400px;
            border-radius: 5px;
            margin: 0 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, .1);
            transition: .5s;
        }
        .image-container { 
            position: relative; 
        }
        .delete-form { 
            position: absolute; top: 10px; right: 10px; z-index: 1; 
        }
        .card-body {
            margin-left: 20px;
        }
    </style>
</head>
<body>
<div class="container">
        <h1>Edit</h1>

        <div class="row">
            <div class="col-md-3">
                
                <div class="card" style="width: 100%;">
                <div class="image-container">
                        <form action="delete.php" method="post" class="delete-form">
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="id" value="<?= $post['id']?>">
                            <button type="submit" value="Delete" name="submit" class="btn btn-danger"  style="height: 40px;border-radius: 100px;"><span class="glyphicon glyphicon-remove"></span></button>
                        </form>
                        </div>
                    <img class="fixed-size-img" style="height: 300px;width: 100%;" src="<?= $post['image']?>" alt="<?= $post['itemName']?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $post['itemName']?></h5>
                        <p class="card-text"><?= $post['itemColor']?></p>
                        <p class="card-text"><?= $post['itemSize']?></p>
                        <p class="card-text"><?= $post['itemPrice']?></p>

                        <a href="main.php?id=<?= $post['id']?>" class="btn btn-primary"><span class="glyphicon glyphicon-triangle-left"></span> Back</a>

                        <a href="edit.php?id=<?= $post['id']?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Edit</a>


                     
                        
                        
                    </div>

                    
                </div>
            </div>

            
        </div>

    </div>
</body>
</html> 