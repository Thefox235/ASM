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
    margin-top: 20px;
    width: 76%;
}

.frmcontent {
    padding: 20px 0px;
}
.mb10 {
    margin-bottom: 10px;
    position: relative;
    width: 80%;
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
<div class="row">
            <div class="row frmtitle">
                <H1 style=" color: #cea778; ">DANH SÁCH KHÁCH HÀNG</H1>
            </div>
            <div class="row frmcontent">

                <div class="row mb10 frmdsloai">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>KHÁCH HÀNG</th>
                            <th>TRẠNG THÁI</th>
                            <th>PHƯƠNG THỨC THANH TOÁN</th>
                            <th>ACTION</th>
                        </tr>
                        <?php
                        foreach($orders as $item) {
                        ?>
                        <tr>
                            <td><?=$item['id']?></td>
                            <td><?=$item['full_name']?></td>
                            <td><?=$item['is_paid']==0? 'Chưa thanh toán' : 'Đã thanh toán'?></td>
                            <td><?=$item['payment_method']?></td>
                            <td><a href="index.php?act=updateOrder&id=<?=$item['id']?>">XEM</a></td>
                        </tr>
                        <?php
                        }
                        ?>

                    </table>
                </div>
            </div>
        </div>