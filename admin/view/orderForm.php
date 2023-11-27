<style>
    .row {
    width: 100%;
    justify-content: center;
}
.frmtitle {
    background-color: #EEE;
    border: 1px #CCC solid;
    color: #666;
    border-radius: 5px;
    padding: 0px 20px;
    position: relative;
    left: 4%;
    margin-top: 20px;
    width: 95%;
}

.frmcontent {
    padding: 20px 0px;
}
.mb10 {
    margin-bottom: 10px;
    position: relative;
    left: 5%;
}
.mb10 {
    margin-bottom: 10px;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 95%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
</style>

<div class="row mb ">
<h1>CHI TIẾT ĐƠN HÀNG</h1>
                <div class="row">
                
                    <form action="index.php?act=updateOrder" method="post">
                    <table class="thongtinnhanhang">
                        <tr>
                            <td width="20%">Khách hàng</td>
                            <td><?=$order['full_name']?></td>
                        </tr>
                        <tr>
                            <td>Phương thức thanh toán</td>
                            <td>
                                <?=$order['payment_method']?>
                            </td>
                        </tr>
                        <tr>
                            <td>Trạng thái</td>
                            <td>
                            <?=$order['is_paid'] == 1 ? 'Đã thanh toán' : 'Chưa thanh toán'?>
                            </td>
                        </tr>
                        <tr>
                            <td>Thông tin sản phẩm</td>
                            <td>
                                <!--Cart section start-->
<div
            class="cart-section section pt-30 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50  pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
            <div class="container">
                <div class="row">

                    <div class="col-12">
                        <!-- Cart Table -->
                        <div class="cart-table table-responsive mb-30">
                            <table class="table">
                            <tfoot>
                                    <tr>                                     
                                        <td class="text-center">
                                            <div class="cart-summary-button">
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                                <thead>
                                    <tr>
                                        <th class="pro-id">ID</th>
                                        <th class="pro-thumbnail">Image</th>
                                        <th class="pro-title">Product</th>
                                        <th class="pro-price">Price</th>
                                    </tr>
                                </thead>
                                <?php
                                    $total = 0;
                                        if(isset($order_detail)&&(count($order_detail)>0)){
                                            foreach ($order_detail as $item) {
                                                $total += $item['amount'];
                                    ?>
                                <tbody>
                                    <tr>
                                        <td class="pro-id"><a href="#"><?=$item['id']?></a></td>
                                        <td class="pro-thumbnail"><a href="#"><img style="max-width: 50%;"
                                                    src="<?=$item['image']?>" alt="Product"></a></td>
                                        <td class="pro-title"><a href="#"><?=$item["name"]?></a></td>
                                        <td class="pro-price"><span>$<?=$item["amount"]?></span></td>
                                    </tr>     
                                    <?php
                                            }
    }
?>                        
                                </tbody>
                                     
                            </table>
                        </div>
                        

                    </div>

                </div>
            </div>
        </div>
        <!--Cart section end-->
                            </td>
                        </tr>
                        <tr>
                            <td>Thay đổi trạng thái</td>
                            <td>
                                <select required name="status" id="status">
                                    <option value="1" <?=$order['is_paid'] == 1 ? 'selected' : ''?>>Đã thanh toán</option>
                                    <option value="0" <?=$order['is_paid'] == 0 ? 'selected' : ''?>>Chưa thanh toán</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button style="color: #fff;" class="btn" type="submit" name="thaydoi" value="Thay đổi trạng thái">Thay đổi</button></td>
                        </tr>
                        <input type="hidden" name="id" value="<?=$order['id']?>">
                    </table>
                    </form>
                </div>
        </div>

