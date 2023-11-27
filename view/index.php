<?php
ob_start();
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
include ("../model/connectdb.php");
include ("../model/categories.php");
include ("../model/products.php");
include ("../model/comment.php");
include ("../model/cart.php");
include ("../model/user.php");
include "../model/order.php";

// include header
include ("../view/header.php");

// content content
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'comment':
            if (isset($_POST['submit'])) {
                $producId = isset($_POST['product_id']) ? $_POST['product_id'] : 0;
                $comment = isset($_POST['comment']) ? trim($_POST['comment']) : '';
                addComment($_SESSION['user']['id'], $producId, $comment);
                header("Location: index.php?act=product-detail&id=". $producId);
            } else {
                header("Location: index.php");
            }
            
            break;

        case 'product-detail':
            $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
            $product = getOneProduct($id);
            $category = getOneCategory($product['category_id']);
            $comments = getAllComments($id);
            include ("../view/product_detail.php");
            break;

        case 'cart':
            include ("../view/cart.php");
            break;

        case 'addToCart':
            addToCart();
            include ("../view/cart.php");
            break;

        case 'delCart':
            $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
            deleteCart($id);
            include ("../view/cart.php");
            break;
        
        case 'logout':
            unset($_SESSION['user']);
            header("Location: index.php");
            break;

        case 'login':
            include ("../view/login.php");
            if (isset($_POST['login'])) {
                $username = isset($_POST['username']) ? trim($_POST['username']) : '';
                $password = isset($_POST['password']) ? trim($_POST['password']) : '';
            
                if (empty($username))   $errors[] = 'Username không được phép rỗng';
                if (empty($password))   $errors[] = 'Password không được phép rỗng';

                if (empty($errors)) {
                    if ($user = login($username, $password)) {
                        header("Location: ../guest/index.php");
                        $_SESSION['user']['id'] = $user['id'];
                        $_SESSION['user']['full_name'] = $user['full_name'];
                        $_SESSION['user']['is_admin'] = $user['is_admin'];
                        if ($_SESSION['user']['is_admin'] === 1) {
                            header("Location: ../admin/index.php");
                        }
                    } else {
                        $_SESSION['loginError'][] = 'User name hoặc mật khẩu không đúng!';
                        
                    }
                } else {
                    $_SESSION['loginError'] = $errors;
               
                }
            }

            break;
        case 'register':
            if (isset($_POST['register'])) {
                $username = isset($_POST['username']) ? trim($_POST['username']) : '';
                $password = isset($_POST['password']) ? trim($_POST['password']) : '';
                $email = isset($_POST['email']) ? trim($_POST['email']) : '';
                $full_name = isset($_POST['full_name']) ? trim($_POST['full_name']) : '';
                $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
                $shipping_address = isset($_POST['shipping_address']) ? trim($_POST['shipping_address']) : '';
                $shipping_city = isset($_POST['shipping_city']) ? trim($_POST['shipping_city']) : '';
                $billing_address = isset($_POST['billing_address']) ? trim($_POST['shipping_address']) : '';
                $billing_city = isset($_POST['billing_city']) ? trim($_POST['billing_city']) : '';
                
                if (empty($username))   $errors[] = 'Username không được phép rỗng';
                if (empty($password))   $errors[] = 'Password không được phép rỗng';
                if (empty($email))      $errors[] = 'Email không được phép rỗng';
                if (empty($full_name))   $errors[] = 'Tên không được phép rỗng';
                if (empty($phone))   $errors[] = 'Số đt không được phép rỗng';
                if (empty($shipping_address))   $errors[] = 'Shipping address không được phép rỗng';
                if (empty($shipping_city))   $errors[] = 'Shipping city không được phép rỗng';

                if (empty($errors)) {
                    if (checkUser($username)) {
                        $errors[] = 'User name '.$username.' đã tồn tại!';
                    } else {
                        $data = [
                            'email' => $email,
                            'username' => $username,
                            'password' => md5($password),
                            'full_name' => $password,
                            'phone' => $phone,
                            'shipping_address' => $shipping_address,
                            'shipping_city' => $shipping_city,
                            'billing_address' => $billing_address,
                            'billing_city' => $billing_address,
                        ];
                        $userID = createUser($data);
                        if ($userID) {
                            $succes = 'Bạn đã đăng ký thành công!';
                        }
                    }
                }
            }
            include ("../view/register.php");
            break;
        case 'contact':
            include ("../view/contact.php");
            break;
        case 'qna':
            include ("../view/qna.php");
            break;
        case 'payment':
            // tao don hang voi bang order + order_detail
            // xoa session
            if(isset($_POST['payment'])&&($_POST['payment'])) {
                // tiến hành đặt hàng
                addOrder();
            }
            include "../view/payment_success.php";
            break;
        default:
            $catId = isset($_GET['catId']) ? (int)$_GET['catId'] : 0;
            $categories = getAllCategories();
            $products = getAllProducts($catId);
            include ("../view/home.php");
            break;
    }
} else {
    $catId = isset($_GET['catId']) ? (int)$_GET['catId'] : 0;
    $categories = getAllCategories();
    $products = getAllProducts($catId);
    include ("../view/home.php");
}

// include footer
include ("../view/footer.php");
