<?php
function addOrder() {
    $conn=connectdb();

    echo '<pre>';
    var_dump($_SESSION['cart']);
    var_dump($_SESSION['objuser']['user_id']);
    echo '</pre>';

    //add vào bảng order
            $sql = "INSERT INTO orders (`is_paid`, `payment_method`, `user_id`) 
            VALUES (0, 'Cash', '".$_SESSION['objuser']['user_id']."')";
            echo $sql;
    // use exec() because no results are returned
    $conn->exec($sql);
    $orderId = $conn->lastInsertId();
    echo $orderId;

    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $id => $item) {
            //add vào bảng orders_detail
            echo $sql = "INSERT INTO orders_detail (`amount`, `order_id`, `product_id`) 
                    VALUES ('".$item['price']."', '".$orderId."', '".$id."')";
                    echo '<br>';
            $conn->exec($sql);
        }
        // huỷ giỏ hàng
        unset($_SESSION['cart']);
        exit;
    }
}

function getAllOrders() {
    $conn=connectdb();
    $sql = "SELECT o.id, o.is_paid, o.payment_method, u.id as user_id, u.full_name
            FROM orders as o
            INNER JOIN users as u ON o.user_id = u.id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}

function getOneOrder($id){
    $conn=connectdb();
    $sql = "SELECT o.id, o.is_paid, o.payment_method, u.id as user_id, u.full_name
            FROM orders as o
            INNER JOIN users as u ON o.user_id = u.id WHERE o.id=".$id;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch(); // Lấy 1 dòng
    return $result;
}

function getOrderDetail($id){
    $conn=connectdb();
    $sql = "SELECT o.id, o.amount, p.id, p.name, p.image
            FROM orders_detail as o
            INNER JOIN products as p ON o.product_id = p.id WHERE o.order_id=".$id;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll(); // Lấy 1 dòng
    return $result;
}

function updateOrder($id, $status){
    $conn=connectdb();
    $sql = "UPDATE orders SET `is_paid`='".$status."' WHERE id=".$id;
    // Prepare statement
    $stmt = $conn->prepare($sql);
    // execute the query
    $stmt->execute();
}
?>