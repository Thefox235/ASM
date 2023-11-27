
<div class="row">
            <div class="row frmtitle">
                <H1>THÊM LOẠI HÀNG</H1>
            </div>
            <div class="row frmcontent">
                <div class="row mb10 frmdsloai">
                    <?php
                    if (isset($success)) echo $success;
                    ?>
                <form action="index.php?act=addCate" method="POST"> 
                    <table class="thongtinnhanhang">
                        <tr>
                            <td>Id</td>
                            <td><input required type="number" name="id" id="id" value=""></td>                           
                        </tr>
                        <tr>
                            <td width="20%">Tên danh mục</td>
                            <td><input required type="text" name="name" id="name" value=""></td>
                        </tr>
                        <tr>
                            <td>Mô tả</td>
                            <td>
                                <textarea required id="description" name="description" rows="4" cols="50"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Vị trí</td>
                            <td><input required type="number" name="position" id="position" value=""></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="themmoi" value="Thêm mới"></td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>