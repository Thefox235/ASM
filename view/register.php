<style>
        .box-login{
            width: 100%;
            position: relative;
            left: 55%;
        }
    </style>
                        
        <div class="col-md-6 col-sm-6" >
                        <div class="customer-login-register register-pt-0">
                            <div class="form-register-title" style=" text-align: center; position: relative;left: 55%;padding: 10px;">
                                <h2>ĐĂNG KÝ THÀNH VIÊN</h2>
                            </div>

                            <div class="success">
                    <?php 
                        if (isset($succes)) {
                            echo $succes;
                        }
                    ?>
                    </div>
                    <div class="error">
                    <?php 
                        if (isset($errors) && count($errors) > 0) {
                            echo '<ul>';
                            foreach ($errors as $error) {
                                echo '<li>'.$error.'</li>';
                            }
                            echo '</ul>';
                        }
                    ?>
                    </div>
                        <div class="box-login">
                            <div class="register-form">
                                <form action="index.php?act=register" method="POST">
                                    <div class="form-fild">
                                        <p><label>Email<span class="required">*</span></label></p>
                                        <input required type="email" name="email">
                                    </div>
                                    <div class="form-fild">
                                        <p><label>Username<span class="required">*</span></label></p>
                                        <input required type="text" name="username">
                                    </div>
                                    <div class="form-fild">
                                        <p><label>Mật khẩu<span class="required">*</span></label></p>
                                        <input required type="password" name="password">
                                    </div>
                                    <div class="form-fild">
                                        <p><label>Họ tên<span class="required">*</span></label></p>
                                        <input required type="text" name="full_name">
                                    </div>
                                    <div class="form-fild">
                                        <p><label>Điện thoại<span class="required">*</span></label></p>
                                        <input required type="text" name="phone">
                                    </div>
                                    <div class="form-fild">
                                        <p><label>Địa chỉ giao hàng<span class="required">*</span></label></p>
                                        <input required type="text" name="shipping_address">
                                    </div>
                                    <div class="form-fild">
                                        <p><label>Thành Phố giao hàng<span class="required">*</span></label></p>
                                        <input required type="text" name="shipping_city">
                                    </div>
                                    <div class="form-fild">
                                        <p><label>Địa chỉ thanh toán<span class="required">*</span></label></p>
                                        <input type="text" name="billing_address">
                                    </div>
                                    <div class="form-fild">
                                        <p><label>Thành Phố thanh toán<span class="required">*</span></label></p>
                                        <input type="text" name="billing_city">
                                    </div>
                                    <div class="register-submit">
                                        <button type="submit" name="register" class="btn">Register</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                    <!--Register Form End-->
