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
<div class="main">
    <h2>THỐNG KÊ</h2>
</div>
<div class="row frmcontent">
                <div class="row mb10 frmdsloai">
                    <table>
                        <tr>
                            <th>TÊN LOẠI</th>
                            <th>SỐ SẢN PHẨM</th>
                        </tr>
                        <?php
                            if(isset($productsStats)&&(count($productsStats)>0)){
                                foreach ($productsStats as $item) {
                        ?>
                                    <tr>
                                        <td><?=$item['name']?></td>
                                        <td><?=$item['total']?></td>
                                    </tr>
                        <?php
                                }
                            }
                        ?>
                    </table>
                </div>
            </div>

            <div class="row frmcontent">
                <div class="row mb10 frmdsloai">
                    <table>
                        <tr>
                            <th>HOÁ ĐƠN</th>
                            <th>DOANH THU</th>
                        </tr>
                        <?php
                            $total = 0;
                            if(isset($revenueStats)&&(count($revenueStats)>0)){
                                $i=1;
                                foreach ($revenueStats as $item) {
                                    $total += $item['total'];
                        ?>
                                    <tr>
                                        <td><?=$item['id']?></td>
                                        <td><?=$item['total']?></td>
                                    </tr>
                        <?php
                                }
                            }
                        ?>
                        <tr>
                            <th>Tổng doanh thu</th>
                            <th>
                            <?=$total?>
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
</div>