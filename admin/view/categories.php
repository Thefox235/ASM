<style>
    .row {
    float: left;
    width: 100%;
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
<div class="row">
            <div class="row frmtitle">
                <H1 style="position: relative;left: 34%; color: #cea778; " >DANH SÁCH LOẠI HÀNG</H1>
            </div>
            <div class="row frmcontent">
                <div class="row mb10 frmdsloai">
                    <table>
                        <tr>
                            <th>MÃ LOẠI</th>
                            <th>TÊN LOẠI</th>
                            <th></th>
                        </tr>
                        <?php
                        if (isset($categories) && count($categories) > 0 ) {
                            foreach ($categories as $category) {
                            ?>
                                <tr>
                                    <td><?=$category['id']?></td>
                                    <td><?=$category['name']?></td>
                                    <td>
                                        <a href="index.php?act=editCat&id=<?=$category['id']?>"><input type="button" value="Sửa"></a>
                                        <a href="index.php?act=delCat&id=<?=$category['id']?>"><input type="button" value="Xóa"></a>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            echo 'Chưa có danh mục nào';
                        }
                        ?>
                    </table>
                </div>
                <div class="row mb10">
                    <a href="index.php?act=addCate"><input type="button" value="Nhập thêm"></a>
                </div>
            </div>
        </div>