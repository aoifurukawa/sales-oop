<?php

include '../classes/User.php';

$user = new User;

$delete = $user->deleteProduct($_GET['product_id']);
