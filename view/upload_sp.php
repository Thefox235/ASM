<?php
    include("../model/xl_sanpham.php");
     $id="";
     $category_id="";
     $price="";
     $name="";
     $date="";
     $description="";
     $image="";
     $quantity="";
     $flag=1;

     if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["id"])){echo(""); $flag=0;
        }else {$id=$_POST['id'];$flag = 1;}

        }if(empty($_POST["category_id"])){echo(""); $flag=0;
        }else {$category_id=$_POST['category_id'];$flag = 1;}

        if(empty($_POST["price"])){echo(""); $flag=0;
        }else {$price=$_POST['price'];$flag = 1;}

        if(empty($_POST["name"])){echo(""); $flag=0;
        }else {$name=$_POST['name'];$flag = 1;}

        if(empty($_POST["description"])){echo(""); $flag=0;
        }else {$description=$_POST['description'];$flag = 1;}
        
        if(empty($_POST["quantity"])){echo(""); $flag=0;
        }else {$quantity=$_POST['quantity'];$flag = 1;}
        if(isset($_FILES['image'])){
            var_dump($_FILES['image']);
            $image = basename($_FILES['image']['name']);
            $path ='../view/images/'.$_FILES;
            $target_file = $path . $image; 
            move_uploaded_file($_FILES['image']['tmp_name'],$target_file);
            $flag =1;
        }
        if($flag == 1){
            themsp ("products", $id, $category_id, $price, $name, $description, $image, $quantity);
        }
        if(isset($_REQUEST['del'])){
            $del = $_REQUEST['del'];
            if( $del == 1){
                $id =  $_REQUEST['id'];
                deletesp("products",$id);
            }
        }
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <style>
        .customer-login-register{
            position: relative; 
            left: 55%;
        }
    </style>
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
                                
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-fild">
                                        <p><label>Mã sản phẩm<span class="required">*</span></label></p>
                                        <input type="number" name="id" value="">
                                    </div>
                                    <div class="form-fild">
                                        <p><label>Tên sản phẩm<span class="required">*</span></label></p>
                                        <input type="text" name="name" value="">
                                    </div>
                                    <div class="form-fild">
                                        <p><label>Giá thành<span class="required">*</span></label></p>
                                        <input type="number" name="price" value="">
                                    </div>
                                    <div class="form-fild">
                                        <p><label>Số lượng<span class="required">*</span></label></p>
                                        <input type="text" name="quantity" value="">
                                    </div>
                                    <div >
                                        <p><label>Images<span class="required">*</span></label></p>
                                        <input type="file" name="image" >
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
                                    <div class="comment-form-comment">
                                                            <label>Mô tả</label>
                                                            <textarea name="description" rows="4" cols="50"></textarea>
                                                        </div>
                                    <div class="login-submit">
                                        <input type="submit" name="login" value="Tạo">                
                                    </div>
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
</body>
</html>


