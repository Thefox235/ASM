<?php
ob_start();
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');

if (isset($_SESSION['user']) && $_SESSION['user']['is_admin'] == 1) {

    include ("../model/connectdb.php");
    include ("../model/categories.php");
    include ("../model/products.php");
    include ("../model/user.php");
    include "../model/order.php";
    include "../model/statistic.php";
    
    // include header
    include ("view/header.php");
    
    // content content
    if (isset($_GET['act'])) {
        switch ($_GET['act']) {
            case 'categories':
                $categories = getAllCategories();
                include ("view/categories.php");
                break;

            case 'delCat':
                $catId = isset($_GET['id']) ? (int) $_GET['id'] : 0;
                if ($catId) {
                    deleteCategory($catId);
                }
                header("Location: index.php?act=categories");
                break; 

            case 'addCate':
                if (isset($_POST['themmoi'])) {
                    $id =  isset($_POST['id']) ? trim($_POST['id']) : 'n/a';
                    $name = isset($_POST['name']) ? trim($_POST['name']) : 'n/a';
                    $description = isset($_POST['description']) ? trim($_POST['description']) : 'n/a';
                    $position = isset($_POST['position']) ? trim($_POST['position']) : 0;
                    $catId = addCategory(['id'=> $id, 'name' => $name, 'description' => $description, 'position' => $position]);                
                    if ($catId) $success = 'Bạn đã thêm danh mục thành công!';
                }

                include ("view/addCategoryForm.php");
                break; 

            case 'editCat':
            
                    if (isset($_POST['update'])) {
                        $id = isset($_POST['id']) ? trim($_POST['id']) : 0;
                        $name = isset($_POST['name']) ? trim($_POST['name']) : 'n/a';
                        $description = isset($_POST['description']) ? trim($_POST['description']) : 'n/a';
                        $position = isset($_POST['position']) ? trim($_POST['position']) : 0;
                        updateCategory(['id' => $id, 'name' => $name, 'description' => $description, 'position' => $position]);
                        $success = 'Bạn đã update danh mục thành công!';
                    }
                
                $catId = isset($_GET['id']) ? (int) $_GET['id'] : 0;
                if ($catId) {
                    $category = getOneCategory($catId);
                    include ("view/editCategoryForm.php");
                } else {
                    header("Location: index.php?act=categories");
                }
                break; 
            case 'hienthi':
                include ("../view/hienthisp.php");
                break;
            case 'upload_sp':
                include ("../view/upload_sp.php");
                break;
            case "editsp" :
                include "./../View/editsp.php";
                break;
            case 'orders':
                $orders = getAllOrders();
                    include "view/orders.php";
                break;
            case 'updateOrder':
                if(isset($_GET['id'])){
                    $id=$_GET['id'];
                    $order = getOneOrder($id);
                    $order_detail = getOrderDetail($id);
                    include "view/orderForm.php";
                }

                //LƯU 1 RECORD đúng với params từ form submit
                if(isset($_POST['thaydoi'])&&($_POST['thaydoi'])){
                    $id=$_POST['id'];
                    $status=$_POST['status'];
                    updateOrder($id, $status);
                    header('location: index.php?act=orders');
                }
            break;
                case 'updateProduct':
                    // Lấy data từ form
                    if(isset($_POST['edit'])&&($_POST['edit'])){
                        $id_new = $_POST['id_new'];
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $category_id=$_POST['category_id'];
                        $description=$_POST['description'];
                        $price=$_POST['price'];
                        $quantity=$_POST['quantity'];

                        $target_file = $_POST['oldImage'];
                        //lưu đường dẫn hình ảnh vào database
                            //upload hình ảnh lên host
                            if (isset($_FILES["image"]) && $_FILES["image"]["name"]!="") {
                                $target_dir = "../uploads/";
                                // Hàm basename() dùng để trả về tên tập tin từ một đường dẫn.
                                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                                
                                $uploadOk = 1;
                                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                                
                                // Kiểm tra ext của file có thoả png, jpeg, gif
                                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                                && $imageFileType != "gif" ) {
                                    $uploadOk = 0;
                                }
                            
                                if ($uploadOk == 0) {
                                    //echo "Xin lỗi, tệp của bạn không được tải lên.";
                                    $target_file = "";
                                } else {
                                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                                }
                            }
                        
                        // gọi hàm thêm product
                        updateProduct($id, $category_id, $name, $description, $price, $quantity, $target_file, $id_new);
                        header('location: index.php?act=products');
                    } else {
                        $id = $_GET['id'];
                        $product = getOneProduct($id);
                        $categories = getAllCategories();
                        include "view/updateProductForm.php";
                    }
                break;
            case 'deleteProduct':
                $id = $_GET['id'];
                if ($id) {
                    // gọi hàm delete product
                    deleteProduct($id);
                }
                header('location: index.php?act=hienthi');
                break;
            default:
                include ("view/home.php");
                break;
        }
    } else {
        $productsStats = getProductsStas();
        $revenueStats = getRevenueStas();
        include ("view/home.php");
    }
    
    // include footer
    include ("view/footer.php");
} else {
    header("Location: ../index.php");
}
