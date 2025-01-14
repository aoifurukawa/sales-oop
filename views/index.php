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
<body class="bg-light">
        <div style="height: 100vh;">
            <div class="row h-100 m-0">
                <div class="card w-50 my-auto mx-auto">
                    <div class="card-header bg-white border-0 py-3">
                        <h1 class="text-center text-primary">LOGIN<i class="fa-solid fa-right-to-bracket"></i></h1>
                    </div>
                    <div class="card-body text-center">
                        <form action="../actions/login.php" method="post">
                            <input type="text" name="username" placeholder="USERNAME" class="form-control mb-2" required autofocus>
                            <input type="password" name="password" id="password" placeholder="PASSWORD" class="form-control mb-3">
                            <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>
                        </form>

                        <button class="btn btn-danger btn-outline-white w-50"><a href="register.php" class="text-white">Create an account</a></button>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>