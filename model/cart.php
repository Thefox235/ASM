<?php
function addToCart() {
    if (isset($_POST['addCart'])) {
        $id = isset($_POST['id']) ? $_POST['id'] : 0;
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $price = isset($_POST['price']) ? $_POST['price'] : 0;
        $image = isset($_POST['image']) ? $_POST['image'] : '';
        $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 0;

        // init Cart session
        if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
        
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$id]['name'] = $name;
            $_SESSION['cart'][$id]['price'] = $price;
            $_SESSION['cart'][$id]['name'] = $name;
            $_SESSION['cart'][$id]['image'] = $image;
            $_SESSION['cart'][$id]['quantity'] = $quantity;
        }
    }
}

function deleteCart($id) {
    if ($id) {
        unset($_SESSION['cart'][$id]);
    }
}