<?php
    include "../model/xl_sanpham.php";
?>

<script src="https://kit.fontawesome.com/8c204d0fdf.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/iconfont.min.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/helper.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../view/css/sanpham.css">
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
<div class="row mb ">
    <!-- <div class="bannerhead" style=" width: 120%; justify-content: center; display: flex; ">
    
        <div class="banner">
            <img src="../view/images/banner.png" alt="">
        </div>
    </div> -->
        <!--Banner section end-->
        <div class="container">
            <!-- Sale item Section Start -->
            <div class="box_sales">
                <div class="time_count">
                    
                        <div class="main">
                        <link rel="stylesheet" href="../view/css/timecount.css">
                            <div class="overlay">
                                <div class="title"><span style="color: #FF0F00;">FlashSales</span> sẽ bắt đầu vào</div>
                                <div class="title" id="end-date">20 March 2022 10:00 PM</div>
                                <div class="col">
                                    <div>
                                        <input type="text" readonly value="0">
                                        <br/>
                                        <label for="">Hours</label>
                                    </div>
                                    <div>
                                        <input type="text" readonly value="0">
                                        <br/>
                                        <label for="">Minutes</label>
                                    </div>
                                    <div>
                                        <input type="text" readonly value="0">
                                        <br/>
                                        <label for="">Seconds</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script src="../view/js/app.js"></script>
                </div>
            <?php
                $rc = danhsachsp('products');
                    
                        for($i=1;$i<=4;$i++){
                            $product = $rc[$i];
                        ?>
                    <div class="box-sanpham" 
                    style="width: 25%;
                    float: left;
                    padding: 10px;">

                        <form action="index.php?act=addToCart" method="POST" >
                          
        <div class="single-product mb-30">
                                            <div class="product-img">
                                                <a href="index.php?act=product-detail&id=<?=$product['id']?>">
                                                <img src="<?=$product['image']?>" alt="">
                                                </a>
                                                <span class="descount-sticker">-10%</span>
                                                <span class="sticker">New</span>

                                                <input type="hidden" name="id" value="<?=$product['id']?>">
                                                <input type="hidden" name="name" value="<?=$product['name']?>">
                                                <input type="hidden" name="price" value="<?=$product['price']?>">                                       
                                                <input type="hidden" name="image" value="<?=$product['image']?>">
                                                <input type="hidden" name="quantity" value="1">
                                                
                                                <div class="product-action d-flex justify-content-between">
                                                    <a class="product-btn" href="#"><button type="submit" name="addCart" value="Add To Cart" style="background-color: #323233;">ADD TO CART</button></a>
                                                    <ul class="d-flex">
                                                        <li><a href="#quick-view-modal-container" data-toggle="modal"
                                                                title="Quick View"><i class="fa fa-eye"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-exchange"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="single-product.html"><?=$product['name']?></a></h3>
                                                <div class="ratting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <h4 class="price"><span class="new">$<?=$product['price']?></span><span
                                                        class="old"></span></h4>
                                            </div>
        </div>
                                        </form></div>
                        <?php
                        }
                    
                    ?>
            </div>
            <!-- Sale item Section End -->

        <!-- Feature Section Start -->
        <div class="feature-section section pt-100 pt-md-75 pt-sm-60 pt-xs-50">
            
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <!-- Single Faeture Start -->
                        <div class="single-feature feature-style-2 mb-30">
                            <div class="icon">
                                <i class="fa-truck fa"></i>
                            </div>
                            <div class="content">
                                <h2>Free shipping worldwide</h2>
                                <p>On order over $200</p>
                            </div>
                        </div>
                        <!-- Single Faeture End -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <!-- Single Faeture Start -->
                        <div class="single-feature feature-style-2 mb-30">
                            <div class="icon">
                                <i class="fa fa-undo"></i>
                            </div>
                            <div class="content">
                                <h2>30 days free return</h2>
                                <p>Money back guarantee</p>
                            </div>
                        </div>
                        <!-- Single Faeture End -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <!-- Single Faeture Start -->
                        <div class="single-feature feature-style-2 mb-30 br-0">
                            <div class="icon">
                                <i class="fa fa-thumbs-o-up"></i>
                            </div>
                            <div class="content">
                                <h2>Member safe shopping</h2>
                                <p>Safe shopping guarantee</p>
                            </div>
                        </div>
                        <!-- Single Faeture End -->
                    </div>
                </div>
                <div class="cols">
                        <div class="product-tab-menu mb-40 mb-xs-20">
                            <ul class="nav">
                            <li><a data-toggle="tab" href="index.php" class="active">Tất cả</a></li>
                            <?php
                        if (isset($categories) && count($categories) > 0 ) {
                            foreach ($categories as $category) {
                                /*echo '<pre>';
                                var_dump($category);
                                echo '</pre>';*/
                            ?>
                                
                                <li>
                                    <a data-toggle="tab" href="index.php?catId=<?=$category['id']?>"><?=$category['name']?></a>
                                </li>
                            <?php
                            }
                        } else {
                            echo 'Chưa có danh mục nào';
                        }
                        ?>

                                <!-- <li><a class="active" data-toggle="tab" href="#products"> New Products</a></li>
                                <li><a data-toggle="tab" href="#onsale"> OnSale</a></li>
                                <li><a data-toggle="tab" href="#featureproducts"> Feature Products</a></li> -->
                            </ul>
                        </div>
                    </div>
             </div> 
        <!-- Feature Section End -->
        <!-- <img src="../view/images/watch_1.jpg"> -->
        
        
            
        
        <!-- Single Product Start -->
        
        <?php
                    if (isset($products) && count($products) > 0 ) {
                        foreach ($products as $product) {
                        ?>
                    <div class="box-sanpham" 
                    style="width: 25%;
                    float: left;
                    padding: 10px;">

                        <form action="index.php?act=addToCart" method="POST" >
                          
        <div class="single-product mb-30">
                                            <div class="product-img">
                                                <a href="index.php?act=product-detail&id=<?=$product['id']?>">
                                                <img src="<?=$product['image']?>" alt="">
                                                </a>
                                                <span class="descount-sticker">-10%</span>
                                                <span class="sticker">New</span>

                                                <input type="hidden" name="id" value="<?=$product['id']?>">
                                                <input type="hidden" name="name" value="<?=$product['name']?>">
                                                <input type="hidden" name="price" value="<?=$product['price']?>">
                                                <input type="hidden" name="image" value="<?=$product['image']?>">
                                                <input type="hidden" name="quantity" value="1">
                                                
                                                <div class="product-action d-flex justify-content-between">
                                                    <a class="product-btn" href="#"><button type="submit" name="addCart" value="Add To Cart" style="background-color: #323233;">ADD TO CART</button></a>
                                                    <ul class="d-flex">
                                                        <li><a href="#quick-view-modal-container" data-toggle="modal"
                                                                title="Quick View"><i class="fa fa-eye"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-exchange"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="single-product.html"><?=$product['name']?></a></h3>
                                                <div class="ratting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <h4 class="price"><span class="new">$<?=$product['price']?></span><span
                                                        class="old"></span></h4>
                                            </div>
        </div>
                                        </form></div>
                        <?php
                        }
                    } else {
                        echo 'Chưa có sản phẩm nào';
                    }
                    ?>
                                        <!-- Single Product End -->
        

    </div>
            
                 <!--Banner section start-->
        <div class="banner-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <!-- Single Banner Start -->
                        <div class="single-banner mb-30">
                            <a href="#">
                                <img src="../view/images/banner-01.png" alt="">
                            </a>
                        </div>
                        <!-- Single Banner End -->
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <!-- Single Banner Start -->
                        <div class="single-banner mb-30">
                            <a href="#">
                                <img src="../view/images/banner-02.jpg" alt="">
                            </a>
                        </div>
                        <!-- Single Banner End -->
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <!-- Single Banner Start -->
                        <div class="single-banner mb-30">
                            <a href="#">
                                <img src="../view/images/banner-01.jpg" alt="">
                            </a>
                        </div>
                        <!-- Single Banner End -->
                    </div>
                </div>
            </div>
        </div>
        <!--Banner section end-->

            </div>

               
                 <!--List Product section start-->
        <div
            class="list-section section pt-60 pt-lg-75 pt-md-65 pt-sm-55 pt-xs-45 pb-30 pb-lg-10 pb-md-0 pb-sm-0 pb-xs-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-40 mb-sm-30 mb-xs-20">
                        <div class="row">
                            <div class="col-12">
                                <!--List Product Section Title Start-->
                                <div class="list-product-section-title mb-30">
                                    <h2>Top rated </h2>
                                </div>
                                <!--List Product Section Title End-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="tf-element-carousel" data-slick-options='{
                                    "slidesToShow": 1,
                                    "slidesToScroll": 1,
                                    "infinite": true,
                                    "arrows": true,
                                    "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                                    "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                                    }' data-slick-responsive='[
                                    {"breakpoint":768, "settings": {
                                    "slidesToShow": 1,
                                    "arrows": false,
                                    "autoplay": true
                                    }},
                                    {"breakpoint":575, "settings": {
                                    "slidesToShow": 1,
                                    "arrows": false,
                                    "autoplay": true
                                    }}
                                    ]'>
                                    <div class="list-product-group">
                                        <!-- Single List Product Start -->
                                        <div class="single-list-product">
                                            <div class="product-image">
                                                <a href="single-product.html"><img
                                                        src="../view/images/phone_1.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="single-product.html">Iphone </a></h3>
                                                <h4 class="price"><span class="new">$110.00</span><span
                                                        class="old">€130.00</span></h4>
                                            </div>
                                        </div>
                                        <!-- Single List Product End -->
                                        <!-- Single List Product Start -->
                                        <div class="single-list-product">
                                            <div class="product-image">
                                                <a href="single-product.html"><img
                                                        src="../view/images/phone_2.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="single-product.html">Reno </a></h3>
                                                <h4 class="price"><span class="new">$110.00</span><span
                                                        class="old">€130.00</span></h4>
                                            </div>
                                        </div>
                                        <!-- Single List Product End -->
                                        <!-- Single List Product Start -->
                                        <div class="single-list-product">
                                            <div class="product-image">
                                                <a href="single-product.html"><img
                                                        src="../view/images/phone_3.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="single-product.html">Xiaomi </a></h3>
                                                <h4 class="price"><span class="new">$110.00</span><span
                                                        class="old">€130.00</span></h4>
                                            </div>
                                        </div>
                                        <!-- Single List Product End -->
                                    </div>
                                    <div class="list-product-group">
                                       <!-- Single List Product Start -->
                                       <div class="single-list-product">
                                            <div class="product-image">
                                                <a href="single-product.html"><img
                                                        src="../view/images/phone_4.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="single-product.html">Iphone </a></h3>
                                                <h4 class="price"><span class="new">$110.00</span><span
                                                        class="old">€130.00</span></h4>
                                            </div>
                                        </div>
                                        <!-- Single List Product End -->
                                       <!-- Single List Product Start -->
                                       <div class="single-list-product">
                                            <div class="product-image">
                                                <a href="single-product.html"><img
                                                        src="../view/images/phone_5.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="single-product.html">Iphone </a></h3>
                                                <h4 class="price"><span class="new">$110.00</span><span
                                                        class="old">€130.00</span></h4>
                                            </div>
                                        </div>
                                        <!-- Single List Product End -->
                                        <!-- Single List Product Start -->
                                        <div class="single-list-product">
                                            <div class="product-image">
                                                <a href="single-product.html"><img
                                                        src="../view/images/phone_6.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="single-product.html">Iphone </a></h3>
                                                <h4 class="price"><span class="new">$110.00</span><span
                                                        class="old">€130.00</span></h4>
                                            </div>
                                        </div>
                                        <!-- Single List Product End -->
                                    </div>
                                    <div class="list-product-group">
                                        <!-- Single List Product Start -->
                                        <div class="single-list-product">
                                            <div class="product-image">
                                                <a href="single-product.html"><img
                                                        src="../view/images/phone_7.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="single-product.html">Iphone </a></h3>
                                                <h4 class="price"><span class="new">$110.00</span><span
                                                        class="old">€130.00</span></h4>
                                            </div>
                                        </div>
                                        <!-- Single List Product End -->
                                       <!-- Single List Product Start -->
                                       <div class="single-list-product">
                                            <div class="product-image">
                                                <a href="single-product.html"><img
                                                        src="../view/images/phone_8.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="single-product.html">Iphone </a></h3>
                                                <h4 class="price"><span class="new">$110.00</span><span
                                                        class="old">€130.00</span></h4>
                                            </div>
                                        </div>
                                        <!-- Single List Product End -->
                                        <!-- Single List Product Start -->
                                        <div class="single-list-product">
                                            <div class="product-image">
                                                <a href="single-product.html"><img
                                                        src="../view/images/phone_9.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="single-product.html">Iphone </a></h3>
                                                <h4 class="price"><span class="new">$110.00</span><span
                                                        class="old">€130.00</span></h4>
                                            </div>
                                        </div>
                                        <!-- Single List Product End -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-40 mb-sm-30 mb-xs-20">
                        <div class="row">
                            <div class="col-12">
                                <!--List Product Section Title Start-->
                                <div class="list-product-section-title mb-30">
                                    <h2>On-sale</h2>
                                </div>
                                <!--List Product Section Title End-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="tf-element-carousel" data-slick-options='{
                                    "slidesToShow": 1,
                                    "slidesToScroll": 1,
                                    "infinite": true,
                                    "arrows": true,
                                    "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                                    "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                                    }' data-slick-responsive='[
                                    {"breakpoint":768, "settings": {
                                    "slidesToShow": 1,
                                    "arrows": false,
                                    "autoplay": true
                                    }},
                                    {"breakpoint":575, "settings": {
                                    "slidesToShow": 1,
                                    "arrows": false,
                                    "autoplay": true
                                    }}
                                    ]'>
                                    <div class="list-product-group">
                                        <!-- Single List Product Start -->
                                        <div class="single-list-product">
                                            <div class="product-image">
                                                <a href="single-product.html"><img
                                                        src="../view/images/watch_1.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="single-product.html">Rolex</a></h3>
                                                <h4 class="price"><span class="new">€125.00</span></h4>
                                            </div>
                                        </div>
                                        <!-- Single List Product End -->
                                        <!-- Single List Product Start -->
                                        <div class="single-list-product">
                                            <div class="product-image">
                                                <a href="single-product.html"><img
                                                        src="../view/images/watch_2.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="single-product.html">Rolex</a></h3>
                                                <h4 class="price"><span class="new">€125.00</span></h4>
                                            </div>
                                        </div>
                                        <!-- Single List Product End -->
                                        <!-- Single List Product Start -->
                                        <div class="single-list-product">
                                            <div class="product-image">
                                                <a href="single-product.html"><img
                                                        src="../view/images/watch_3.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="single-product.html">Rolex</a></h3>
                                                <h4 class="price"><span class="new">€125.00</span></h4>
                                            </div>
                                        </div>
                                        <!-- Single List Product End -->
                                    </div>
                                    <div class="list-product-group">
                                        <!-- Single List Product Start -->
                                        <div class="single-list-product">
                                            <div class="product-image">
                                                <a href="single-product.html"><img
                                                        src="../view/images/watch_4.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="single-product.html">Rolex</a></h3>
                                                <h4 class="price"><span class="new">€125.00</span></h4>
                                            </div>
                                        </div>
                                        <!-- Single List Product End -->
                                        <!-- Single List Product Start -->
                                        <div class="single-list-product">
                                            <div class="product-image">
                                                <a href="single-product.html"><img
                                                        src="../view/images/watch_5.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="single-product.html">Rolex</a></h3>
                                                <h4 class="price"><span class="new">€125.00</span></h4>
                                            </div>
                                        </div>
                                        <!-- Single List Product End -->
                                        <!-- Single List Product Start -->
                                        <div class="single-list-product">
                                            <div class="product-image">
                                                <a href="single-product.html"><img
                                                        src="../view/images/watch_6.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="single-product.html">Rolex</a></h3>
                                                <h4 class="price"><span class="new">€125.00</span></h4>
                                            </div>
                                        </div>
                                        <!-- Single List Product End -->
                                    </div>
                                    <div class="list-product-group">
                                        <!-- Single List Product Start -->
                                        <div class="single-list-product">
                                            <div class="product-image">
                                                <a href="single-product.html"><img
                                                        src="../view/images/watch_7.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="single-product.html">Rolex</a></h3>
                                                <h4 class="price"><span class="new">€125.00</span></h4>
                                            </div>
                                        </div>
                                        <!-- Single List Product End -->
                                        <!-- Single List Product Start -->
                                        <div class="single-list-product">
                                            <div class="product-image">
                                                <a href="single-product.html"><img
                                                        src="../view/images/watch_8.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="single-product.html">Rolex</a></h3>
                                                <h4 class="price"><span class="new">€125.00</span></h4>
                                            </div>
                                        </div>
                                        <!-- Single List Product End -->
                                        <!-- Single List Product Start -->
                                        <div class="single-list-product">
                                            <div class="product-image">
                                                <a href="single-product.html"><img
                                                        src="../view/images/watch_9.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="single-product.html">Rolex</a></h3>
                                                <h4 class="price"><span class="new">€125.00</span></h4>
                                            </div>
                                        </div>
                                        <!-- Single List Product End -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-40 mb-sm-30 mb-xs-20">
                        <div class="row">
                            <div class="col-12">
                                <!--List Product Section Title Start-->
                                <div class="list-product-section-title mb-30">
                                    <h2>Trending items</h2>
                                </div>
                                <!--List Product Section Title End-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="tf-element-carousel" data-slick-options='{
                                    "slidesToShow": 1,
                                    "slidesToScroll": 1,
                                    "infinite": true,
                                    "arrows": true,
                                    "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                                    "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                                    }' data-slick-responsive='[
                                    {"breakpoint":768, "settings": {
                                    "slidesToShow": 1,
                                    "arrows": false,
                                    "autoplay": true
                                    }},
                                    {"breakpoint":575, "settings": {
                                    "slidesToShow": 1,
                                    "arrows": false,
                                    "autoplay": true
                                    }}
                                    ]'>
                                    <div class="list-product-group">
                                        <!-- Single List Product Start -->
                                        <div class="single-list-product">
                                            <div class="product-image">
                                                <a href="single-product.html"><img
                                                        src="../view/images/laptop_1.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="single-product.html">Acer Nitro </a></h3>
                                                <h4 class="price"><span class="new">€70.00</span></h4>
                                            </div>
                                        </div>
                                        <!-- Single List Product End -->
                                        <!-- Single List Product Start -->
                                        <div class="single-list-product">
                                            <div class="product-image">
                                                <a href="single-product.html"><img
                                                        src="../view/images/laptop_2.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="single-product.html">Acer Nitro </a></h3>
                                                <h4 class="price"><span class="new">€70.00</span></h4>
                                            </div>
                                        </div>
                                        <!-- Single List Product End -->
                                        <!-- Single List Product Start -->
                                        <div class="single-list-product">
                                            <div class="product-image">
                                                <a href="single-product.html"><img
                                                        src="../view/images/laptop_3.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="single-product.html">Acer Nitro </a></h3>
                                                <h4 class="price"><span class="new">€70.00</span></h4>
                                            </div>
                                        </div>
                                        <!-- Single List Product End -->
                                    </div>
                                    <div class="list-product-group">
                                        <!-- Single List Product Start -->
                                        <div class="single-list-product">
                                            <div class="product-image">
                                                <a href="single-product.html"><img
                                                        src="../view/images/laptop_4.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="single-product.html">Acer Nitro </a></h3>
                                                <h4 class="price"><span class="new">€70.00</span></h4>
                                            </div>
                                        </div>
                                        <!-- Single List Product End -->
                                        <!-- Single List Product Start -->
                                        <div class="single-list-product">
                                            <div class="product-image">
                                                <a href="single-product.html"><img
                                                        src="../view/images/laptop_5.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="single-product.html">Acer Nitro </a></h3>
                                                <h4 class="price"><span class="new">€70.00</span></h4>
                                            </div>
                                        </div>
                                        <!-- Single List Product End -->
                                        <!-- Single List Product Start -->
                                        <div class="single-list-product">
                                            <div class="product-image">
                                                <a href="single-product.html"><img
                                                        src="../view/images/laptop_6.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="single-product.html">Acer Nitro </a></h3>
                                                <h4 class="price"><span class="new">€70.00</span></h4>
                                            </div>
                                        </div>
                                        <!-- Single List Product End -->
                                    </div>
                                    <div class="list-product-group">
                                        <!-- Single List Product Start -->
                                        <div class="single-list-product">
                                            <div class="product-image">
                                                <a href="single-product.html"><img
                                                        src="../view/images/laptop_7.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="single-product.html">Acer Nitro </a></h3>
                                                <h4 class="price"><span class="new">€70.00</span></h4>
                                            </div>
                                        </div>
                                        <!-- Single List Product End -->
                                        <!-- Single List Product Start -->
                                        <div class="single-list-product">
                                            <div class="product-image">
                                                <a href="single-product.html"><img
                                                        src="../view/images/laptop_8.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="single-product.html">Acer Nitro </a></h3>
                                                <h4 class="price"><span class="new">€70.00</span></h4>
                                            </div>
                                        </div>
                                        <!-- Single List Product End -->
                                        <!-- Single List Product Start -->
                                        <div class="single-list-product">
                                            <div class="product-image">
                                                <a href="single-product.html"><img
                                                        src="../view/images/laptop_9.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="single-product.html">Acer Nitro </a></h3>
                                                <h4 class="price"><span class="new">€70.00</span></h4>
                                            </div>
                                        </div>
                                        <!-- Single List Product End -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--List Product section end-->

            </div>
        </div>



    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

