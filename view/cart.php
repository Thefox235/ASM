<style>
.thongtinnhanhang tr td {
    text-align: left;
    padding: 10px;
}

.thongtinnhanhang input {
    width: 100%;
    border: 1px #CCC solid;
    padding: 5px;
    border-radius: 5px;
}
table {
    width: 100%;
    border-collapse: collapse;
}
.info-box{
    display: flex;
    position: relative;
    left: 200px;
}
</style>
<?php
            if (isset($_SESSION['objuser'])) {
                echo '<form action="index.php?act=payment" method="post">';
            }
?>
<div class="row mb ">
            <div class="mr">
                <div class="info-box">
                    <h1>THÔNG TIN NHẬN HÀNG</h1>
                    <table class="thongtinnhanhang">
                        <tr>
                            <td width="20%">Họ tên</td>
                            <td><input type="text" name="hoten"></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td><input type="text" name="diachi"></td>
                        </tr>
                        <tr>
                            <td>Điện thoại</td>
                            <td><input type="text" name="dienthoai"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email"></td>
                        </tr>
                    </table>
                </div>
                
                
                
            </div>
        </div>

        <!--Cart section start-->
        <div
            class="cart-section section pt-30 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50  pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
            <div class="container">
                <div class="row">

                    <div class="col-12">
                        <!-- Cart Table -->
                        <div class="cart-table table-responsive mb-30">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Image</th>
                                        <th class="pro-title">Product</th>
                                        <th class="pro-price">Price</th>
                                        <th class="pro-quantity">Quantity</th>
                                        <th class="pro-subtotal">Total</th>
                                        <th class="pro-remove">Remove</th>
                                    </tr>
                                </thead>
                                <?php
                        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0 ) {
                            $total = 0;
                            foreach ($_SESSION['cart'] as $id => $product) {
                                $total += $product['price'] * $product['quantity'];
                            ?>
                                <tbody>
                                    <tr>
                                        <td class="pro-thumbnail"><a href="#"><img src="<?=$product['image']?>" alt=""></td>
                                        <td class="pro-title"><a href="#"><?=$product['name']?></a></td>
                                        <td class="pro-price"><span>$<?=$product['price']?></span></td>
                                        <td class="pro-quantity">
                                            <div class="pro-qty"><?=$product['quantity']?></div>
                                        </td>
                                        <td class="pro-subtotal"><span>$<?=$product['price'] * $product['quantity']?></span></td>
                                        <td class="pro-remove"><a href="index.php?act=delCart&id=<?=$id?>"><i class="fa fa-trash-o"></i></a></td>
                                    </tr> 
                                    <?php
                            }
                        } else {
                            echo 'Chưa có sản phẩm nào';
                        }
                        ?>        
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-right" >
                                            <h4 style="line-height: 45px;">Tổng:</h4>
                                        </td>
                                        <td class="text-center"><h4 style="line-height: 45px;"><?=isset($total)?$total:0?></h4></td>
                                        <td class="text-center">
                                            <div class="cart-summary-button">
                                                <button style="color: #fff;" class="btn" type="submit" name="payment"  value="ĐỒNG Ý ĐẶT HÀNG">Checkout</button>
                                            </div>
                                        </td>
                                    </tr>
                                 </tfoot> <!--<a style="color: #fff;" class="btn" href="">Checkout</a> -->
                            </table>
                            <?php
                if (isset($_SESSION['objuser'])) {
                    echo '</form>';
                }
                ?>
                        </div>
                        

                    </div>

                </div>
            </div>
        </div>
        <!--Cart section end-->