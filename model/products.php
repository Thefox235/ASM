<?php
function getAllProducts($catId = 0) {
    $conn=connectdb();
    if ($catId) {
        $sql = "SELECT * FROM `products` WHERE category_id = " . $catId;
    } else {
        $sql = "SELECT * FROM `products`";
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll(); // lấy nhiều dòng
    return $kq;
}

function getOneProduct($id) {
    $conn=connectdb();
    $sql = "SELECT * FROM `products` WHERE id = '".$id."'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetch(); // lấy 1 dòng
    return $kq;
}

function deleteProduct($id) {
    $conn=connectdb();
    $sql = "DELETE FROM `products` WHERE id = " . $id;
    $conn->exec($sql);
  }

  function updateProduct($id, $category_id, $name, $description, $price , $quantity, $image, $id_new) {
    $conn=connectdb();
      $sql = "UPDATE products SET 
      `id`='".$id_new."',
      `category_id`='".$category_id."', 
      `name` = '".$name."',
      `description` = '".$description."',
      `price` = '".$price."',
      `quantity` = '".$quantity."',
      `image` = '".$image."'
       WHERE id=".$id;
      // Prepare statement
      $stmt = $conn->prepare($sql);
      // execute the query
      $stmt->execute();
  }
  function categoryList(){
    $conn = connectdb();
    $querySQL="SELECT * FROM categories";

    $stmt = $conn->prepare($querySQL); // chuẩn bị thực thi câu lệnh
    $stmt->execute(); // thực thi câu lệnh Sql
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //$result = $stmt->fetch(); // Lấy 1 dòng
    $result = $stmt->fetchAll(); // Lấy nhiều dòng
    if(count($result) > 0) return $result;
    else return 0;
  }
  