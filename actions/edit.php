<?php

include '../classes/User.php';

$user = new User;

$edit = $user->update($_POST, $_GET['product_id']);