<?php
function getAllCategories() {
    $conn=connectdb();
    $sql = "SELECT * FROM `categories` ORDER BY position LIMIT 50";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll(); // lấy nhiều dòng
    return $kq;
}

function deleteCategory($id) {
    $conn=connectdb();
    $sql = "DELETE FROM categories WHERE `categories`.`id` = " . $id;
    $conn->exec($sql);
}

function getOneCategory($id) {
    $conn=connectdb();
    $sql = "SELECT * FROM `categories` WHERE id = '".$id."'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetch(); // lấy 1 dòng
    return $kq;
}

function addCategory($data) {
    $conn=connectdb();
    $sql = "INSERT INTO `categories` (`id`, `name`, `description`, `position`) 
    VALUES ('".$data['id']."','".$data['name']."', '".$data['description']."', '".$data['position']."')";
    $conn->exec($sql);
    return $conn->lastInsertId();
}

function updateCategory($data) {
    $conn=connectdb();
    $sql = "UPDATE `categories` SET `name` = '".$data['name']."', `description` = '".$data['description']."', `position` = '".$data['position']."' WHERE `categories`.`id` = " . $data['id'];
    $conn->exec($sql);
}