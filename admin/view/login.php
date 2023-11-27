<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">

</head>
<body>
    <style>
        .box-login{
            width: 100%;
            display: flex;
            justify-content: center;
        }
        
    </style>
                <?php
                    if (isset($_SESSION['user'])) {
                        echo '<div class="boxcontent formtaikhoan">';
                        echo 'Hello, ' . $_SESSION['user']['full_name'];
                        echo ' | <a href="index.php?act=logout">Logout</a>';
                        echo '</div">';
                    } else {
                ?>
                    <div class="boxcontent formtaikhoan">
                        <div class="error">
                        <?php 
                            if (isset($_SESSION['loginError']) && count($_SESSION['loginError']) > 0) {
                                echo '<ul>';
                                foreach ($_SESSION['loginError'] as $error) {
                                    echo '<li>'.$error.'</li>';
                                }
                                echo '</ul>';
                                unset($_SESSION['loginError']);
                            }
                        ?>
                    </div>
                    
     <!--Login Register section start-->
    <div class="boxcontent formtaikhoan">
     <div class="login-register-section section pt-30 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50  pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
            <div class="container">
                <div class="box-login">
                    <!--Login Form Start-->
                    <div class="col-md-6 col-sm-6">
                        <div class="customer-login-register">
                            <div class="form-login-title">
                                <h2>Login</h2>
                            </div>
                            <div class="login-form">
                                
                                <form action="index.php?act=login" method="post">
                                    <div class="form-fild">
                                        <p><label>Tên đăng nhập<span class="required">*</span></label></p>
                                        <input required type="text" name="username">
                                    </div>
                                    <div class="form-fild">
                                        <p><label>Mật khẩu <span class="required">*</span></label></p>
                                        <input required type="password" name="password">
                                    </div>
                                    <div class="login-submit">
                                        <input type="submit" name="login" value="Đăng nhập">
                                        
                                        <label>
                                            <input class="checkbox" name="rememberme" value="" type="checkbox">
                                            <span>Remember me</span>
                                        </label>
                                    </div>
                                    <div class="lost-password">
                                        <a href="#">Lost your password?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
    </div>
                    <?php
                    }
                    ?>
                    <!--Login Form End-->
                   
                </div>
            </div>
        </div>
        <!--Login Register section end-->


                    
                        
                        <!-- <form action="index.php?act=login" method="post">
                            <div class="row mb10">
                                Tên đăng nhập<br>
                                <input required type="text" name="username">
                            </div>
                            <div class="row mb10">
                                Mật khẩu<br>

                                <input required type="password" name="password">
                            </div>
                            <div class="row mb10">
                                <input type="checkbox" name=""> Ghi nhớ tài khoản?</div>
                            <div class="row mb10">
                                <input type="submit" name="login" value="Đăng nhập">
                            </div>
                        </form>
                        <li>
                            <a href="#">Quên mật khẩu</a>
                        </li>
                        <li>
                            <a href="index.php?act=register">Đăng ký thành viên</a>
                        </li>               -->

    <script src="https://kit.fontawesome.com/8c204d0fdf.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/helper.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</body>