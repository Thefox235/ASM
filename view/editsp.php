<?php
include "./../Model/XL_sanpham.php";
$sp;
    if(isset($_REQUEST['edit'])){
        $edit = $_REQUEST['edit'];
        if($edit == 0){
            $id = $_REQUEST['id'];
            $sp = mot_sanpham("sanpham",$id);
        }
        if($edit == 1){
            $masp = $_POST['masp'];
            $tensp = $_POST['tensp'];
            $giasp = $_POST['giasp'];
            $slsp = $_POST['slsp'];
            $decribe = $_POST['decribe'];
            $hinhsp = $_POST['hinh_cu'];

            if(isset($_FILES['hinh_moi'])){
                if( $_FILES['hinh_moi']['name'] != ""){
                    $hinhsp = basename($_FILES['hinh_moi']['name']) ;
                    $path ='../view/images/';
                    $target_file = $path .$hinhsp;
                    move_uploaded_file($_FILES['hinh_moi']['tmp_name'], $target_file);
                    unlink("./../view/images/".$_POST['hinh_cu'] );
                }
            }
            capnhatsp ("products", $masp,$tensp,$giasp,$decribe, $slsp,$hinhsp);
            header("Location: index.php?act=1");

        }
  
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div>
                    <form name="" action="index.php?act=editsp&edit=1" method="post" enctype="multipart/form-data">
                masp: <label for=""><?=$sp[0][0]?></label>
                    <input hidden type="text" name="masp" value="<?=$sp[0][0]?>">
                    <br>
                tensp: <input type="text" name="tensp" value="<?=$sp[0][1]?>"><br>
                gia sp: <input type="text" name="giasp" value="<?=$sp[0][2]?>"><br>
                slsp <input type="text" name="slsp" value="<?=$sp[0][6]?>"><br>
                Decribe: <br> <textarea name="decribe" rows="4" cols="50"><?=$sp[0][5]?></textarea> <br>
                hinhsp: <input type="file" name="hinh_moi" value="">
                    <input hidden type="text" name="hinh_cu" value="<?=$sp[0][8]?>">
                    <img height="90px" width="100px" src="../view/image/<?=$sp[0][8]?>">
                    <br>
                    <button type="submit">Cập Nhật</button>
                    </form>
        </div>
</body>
</html>