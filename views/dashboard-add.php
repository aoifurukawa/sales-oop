<?php

include '../classes/User.php';

session_start();

$product = new User;

$all_products = $product->getAllProduct();

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
    <?php if ($all_products->num_rows == 0): ?>
        <div class="card w-50 mx-auto">
            <div class="card-header">
                <div class="row">
                    <div class="col-11">    
                        <h2 class="text-dark">Product List</h2>
                    </div>
                    <div class="col-1">
                        <span class="text-info"><a href="../views/add.php"><i class="fa-solid fa-plus fa-2x"></i></a></span>
                    </div>
                </div>
            </div>

            <div class="card-body bg-dark text-center" style="height: 300px;">
                <h2 class="text-danger text-center mt-5">No records found</h2>
                <i class="fa-regular fa-circle-xmark text-danger fa-5x"></i>
            </div>
        </div>
    <?php else: ?>

    
    
        <div class="card w-50 mx-auto">
            <div class="card-header">
                <div class="row">
                    <div class="col-11">    
                        <h2 class="text-dark">Product List</h2>
                    </div>
                    <div class="col-1">
                        <span class="text-info"><a href="../views/add.php"><i class="fa-solid fa-plus fa-2x"></i></a></span>
                    </div>
                </div>
            </div>

        
            <table class="table table-striped">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>ab</th>
                        <th>c</th>
                    </tr>
                </thead>

                <tbody>
                <?php while ($product = $all_products->fetch_assoc()): ?>
                    <tr>
                        <td><?=$product['id'] ?></td>
                        <td><?=$product['product_name'] ?></td>
                        <td><?=$product['price'] ?></td>
                        <td><?=$product['quantity'] ?></td>
                        <td><a href="../views/edit.php?product_id=<?=$product['id'] ?>"><i class="fa-solid fa-pen-to-square text-warning"></i></a> <a href="../actions/delete.php?product_id=<?=$product['id'] ?>"><i class="fa-solid fa-trash text-danger"></i></a></td>
                        <td></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>
    </main>

</body>
</html>