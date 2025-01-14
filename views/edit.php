<?php

session_start();

include '../classes/User.php';

$user = new User;

$product = $user->edit($_GET['product_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand navbar-dark bg-light" style="margin-bottom: 80px;">
        <div class="container">
            <a href="dashboard-add.php" class="navbar-brand">
                <h1 class="h3 text-dark"><i class="fa-solid fa-house"></i></h1>
            </a>
            <div class="navbar-nav">
                <span class="navbar-text text-dark">welcome, <?= $_SESSION['username']?></span>
                <form action="../actions/logout.php" method="post" class="d-flex ms-2">
                    <button type="submit" class="text-danger bg-transparent border-0"><i class="fa-solid fa-user-xmark"></i></button>
                </form>
            </div>
        </div>
    </nav>

    <main>
        <div class="card w-50 mx-auto mt-3">
            <div class="card-header">
                <h1 class="text-warning text-center"><i class="fa-solid fa-pen-to-square"></i>Edit Product</h1>
            </div>
            <div class="card-body">
                <form action="../actions/edit.php?product_id=<?=$product['id'] ?>" method="post">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="name" name="product_name" value="<?=$product['product_name'] ?>">

                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" name="price" id="price" class="form-control" value="<?=$product['price'] ?>">
                        </div>

                        <div class="col-6">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" value="<?=$product['quantity'] ?>">
                        </div>
                    </div>

                    <input type="submit" value="Edit" class="btn btn-warning w-100 mt-3" name="add_btn">
                </form>
            </div>
        </div>
    </main>
</body>
</html>