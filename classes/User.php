<?php

include "Database.php";

class User extends Database{

    public function store($request){

        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $username = $request['username'];
        $password = $request['password'];

        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (`first_name`, `last_name`, `username`, `password`)
                VALUES ('$first_name', '$last_name', '$username', '$password')";

        if($this->conn->query($sql)){
            header('location: ../views');
            exit;
        }else{
            die('Error creating the users: ' . $this->conn->error);
        }
    }

    public function login($request){
        $username = $request['username'];
        $password = $request['password'];

        $sql = "SELECT * FROM users WHERE username = '$username'";

        $result = $this->conn->query($sql);

        if($result->num_rows == 1){
            $user = $result -> fetch_assoc();

            if(password_verify($password, $user['password'])){
                session_start();
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['full_name'] = $user['first_name'] . " " . $user['last_name'];


                header('location: ../views/dashboard-add.php');
                exit;
            }else{
                die('PAssword is incorrect');
            }
        }else{
            die('Username not found');
        }
    }

    public function logout(){
        session_start();
        session_unset();
        session_destroy();

        header('location: ../views');
        exit;
    }

    public function add($request){
        $product_name = $request['product_name'];
        $price = $request['price'];
        $quantity = $request['quantity'];

        $sql = "INSERT INTO products (`product_name`, `price`, `quantity`)
                VALUES ('$product_name', '$price', '$quantity')";

        if($this->conn->query($sql)){
            header('location: ../views/dashboard-add.php');
            exit;
        }else{
            die('Error creating the users: ' . $this->conn->error);
        }


    }

    public function getAllProduct(){
        $sql = "SELECT * FROM products";
        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die('Error retrieving all products: ' . $this->conn->error);
        }
    }

    public function deleteProduct($product_id){
        $sql = "DELETE FROM products WHERE id = $product_id";

        if($this->conn->query($sql)){
            header('location: ../views/dashboard-add.php');
            exit;
        }else{
            die('Error deleting your account: ' . $this->conn->error);
        }
    }

    public function edit($product_id)
    {
        $sql = "SELECT * FROM products WHERE id = $product_id";

        if($result = $this->conn->query($sql)){
            return $result->fetch_assoc();
        }else{
            die('Error deleting your account: ' . $this->conn->error);
        }
    }

    public function update($request, $product_id){
        $product_name = $request['product_name'];
        $price = $request['price'];
        $quantity = $request['quantity'];


        $sql = "UPDATE products
                SET product_name = '$product_name',
                    price = '$price',
                    quantity = '$quantity'
                WHERE id = $product_id";

        if($this->conn->query($sql)){
            header('location: ../views/dashboard-add.php');
            exit;
        }else{
            die('Error editing information: ' . $this->conn->error);
        }
    }
}