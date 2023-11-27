<!--Login Register section start-->
<div class="boxcontent formtaikhoan">
     <div class="login-register-section section pt-30 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50  pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
            <div class="container">
                <div class="box-login">
                    <!--Login Form Start-->
                    <div class="col-md-6 col-sm-6">
                        <div class="customer-login-register">
                            <div class="form-login-title">
                                <h2>Upload</h2>
                            </div>
                            <div class="login-form">
                                
                                <form action="index.php?act=updateProduct" method="post" enctype="multipart/form-data">
                                    <div class="form-fild">
                                        <input type="hidden" name="id" id="id" value="<?=$product['id']?>">                                  
                                    </div>
                                    <div class="form-fild">
                                        <p><label>Mã sản phẩm<span class="required">*</span></label></p>
                                        <input type="number" name="id_new" id="id_new" value="<?=$product['id']?>">
                                    </div>
                                    <div class="form-fild">
                                        <p><label>Tên sản phẩm<span class="required">*</span></label></p>
                                        <input required type="text" name="name" id="name" value="<?=$product['name']?>">
                                    </div>
                                    <div class="form-fild">
                                        <p><label>Categories<span class="required">*</span></label></p>
                                        <select name="category_id">
                                        <?php
                                $categories=getAllCategories();
                                            if (isset($categories) && count($categories) > 0 ) {
                                                foreach ($categories as $category) {
                                                    /*echo '<pre>';
                                                    var_dump($category);
                                                    echo '</pre>';*/
                                                ?>
                                                <option value="<?=$category['id']?>"><?=$category['name']?></option>                         
                                                <?php
                                                }
                                            } else {
                                                echo 'Chưa có danh mục nào';
                                            }
                                            ?>

        </select>
                                    </div>
                                    <div>
                                        <p><label>Images<span class="required">*</span></label></p>
                                        <input <?=$product['image']!='' ? '' : 'required'?> type="file" name="image" id="image">
                                    </div>
                                    <div>
                                        <p><label>Hình ảnh cũ:<span class="required">*</span></label></p>
                                         <img width="160px" height="160px" src="<?=$product['image']?>">
                                    </div>
                                    <div class="comment-form-comment">
                                                            <label>Mô tả</label>
                                                            <textarea required id="description" name="description" rows="4" cols="50"><?=$product['description']?></textarea>
                                    </div>
                                    <div class="form-fild">
                                        <p><label>Giá thành<span class="required">*</span></label></p>
                                        <input required type="number" name="price" id="price" value="<?=$product['price']?>">
                                    </div>
                                    <div class="form-fild">
                                        <p><label>Số lượng<span class="required">*</span></label></p>
                                        <input required type="number" name="quantity" id="quantity" value="<?=$product['quantity']?>">
                                    </div>
                                    <div class="login-submit">
                                        <input  type="submit" name="edit" value="Cập nhật">                
                                    </div>
                                    <input type="hidden" name="id" value="<?=$product['id']?>">
                                    <input type="hidden" name="oldImage" value="<?=$product['image']?>">
                                </form>
                            </div>
                        </div>
                    </div>
    </div>
                    <!--Login Form End-->
                   
                </div>
            </div>
        </div>
        <!--Login Register section end-->