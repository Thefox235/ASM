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
                                                <a style="color: #fff;" class="btn" href="index.php?act=upload_sp">Thêm Sản Phẩm</a>
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
                                        <th class="pro-quantity">Quantity</th>
                                        <th class="pro-remove">Remove</th>
                                        <th class="pro-remove">Edit</th>
                                    </tr>
                                </thead>
                                <?php
                                include("../model/xl_sanpham.php");
                                $result = danhsachsp("products");
                                for($i = 0; $i<count($result);$i++){
                                    $rc = $result[$i];		
                            ?>
                                <tbody>
                                    <tr>
                                        <td class="pro-id"><a href="#"><?=$rc["id"]?></a></td>
                                        <td class="pro-thumbnail"><a href="#"><img style="max-width: 50%;"
                                                    src="<?=$rc['image']?>" alt="Product"></a></td>
                                        <td class="pro-title"><a href="#"><?=$rc["name"]?></a></td>
                                        <td class="pro-price"><span>$<?=$rc["price"]?></span></td>
                                        <td class="pro-quantity">
                                        <?=$rc ["quantity"]?>
                                        </td>
                                        <td class="pro-remove"><a href="index.php?act=deleteProduct&id=<?=$rc['id']?>"><i class="fa fa-trash-o"></i></a></td>
                                        <td class="pro-remove"><a href="index.php?act=updateProduct&id=<?=$rc['id']?>">Edit</a></td>
                                    </tr>       
                                    <?php
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