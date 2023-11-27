<?php
    function danhsachsp($table_name){
        $conn = connectdb();      
        $sql = "select * from ".$table_name." order by id ";
        $result = $conn->query($sql); 
        $danhsach = $result->fetchAll(); $result->fetchAll();
        return $danhsach;
    }

    function themsp ($tenbang, $id,$category_id, $price, $name, $description, $image, $quantity) {
        $conn = connectdb();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('d-m-y h:i:s');
        $sql = "INSERT into ".$tenbang." VALUES ('".$id."','".$category_id."'
        ,'".$price."','".$name."', '".$description."'
        ,'../view/images/".$image."','".$quantity."', current_timestamp(), current_timestamp())";
         echo $sql;
       $conn->query($sql);
    }

    function danhsachsp_limit($table_name, $st, $stp) {
        $conn = connectdb();
        $sql = "Select * from ".$table_name." order by id limit ".$st.",".$stp."";
        $kq= $conn->query($sql);
        $danhsach = $kq->fetchAll();
        return $danhsach;
    }

    function mot_sanpham($table_name, $id) {
        $conn = connectdb();
        $sql = "select * from ".$table_name." where id = ".$id;
        $result = $conn->query($sql);
        $danhsach = $result->fetchAll();
        return $danhsach;
    }
    function capnhatsp($tenbang, $masp, $tensp, $giasp,$decribe, $slsp,$hinh){
        $conn = connectdb();
        $sql = "Update ".$tenbang."
        Set name='". $tensp."',
        price=". $giasp .",
        quantity=". $slsp.",
        image='".$hinh."',
        description = '".$decribe."'
        where id = ".$masp;
        // echo ($sql);
        $conn->query($sql);
    }
    function deletesp($tenbang,$id){
        $conn = connectdb();
        $sql = "Delete from ".$tenbang." where id = ".$id;
        $conn->query($sql); 
    }
?>