<?php
function getProductsStas() {
    $conn=connectdb();
    $sql = "SELECT c.id, c.name, count(p.id) as total
            FROM categories as c
            INNER JOIN products as p ON p.category_id = c.id
            GROUP BY c.id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll(); // lấy nhiều dòng
    return $kq;
}

function getRevenueStas() {
    $conn=connectdb();
    $sql = "SELECT o.id, SUM(od.amount) AS total
            FROM `orders` o 
            INNER JOIN `orders_detail` od ON od.order_id = o.id	
            GROUP BY o.id;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll(); // lấy nhiều dòng
    return $kq;
}
?>