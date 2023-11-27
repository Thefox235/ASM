
<div class="row">
            <div class="row frmtitle">
                <H1>THÊM LOẠI HÀNG</H1>
            </div>
            <div class="row frmcontent">
                <div class="row mb10 frmdsloai">
                    <?php
                    if (isset($success)) echo $success;
                    ?>
                <form action="index.php?act=editCat" method="POST"> 
                    <table class="thongtinnhanhang">
                    <input type="hidden" name="id" value="<?=$category['id']?>" value="">
                    <tr>
                            <td width="20%">Tên danh mục</td>
                            <td><input required type="text" name="name" value="<?=$category['name']?>" id="name" value=""></td>
                        </tr>
                        <tr>
                            <td>Mô tả</td>
                            <td>
                                <textarea required id="" name="description" rows="4" cols="50">
                                <?=$category['description']?>
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Vị trí</td>
                            <td><input required type="number" value="<?=$category['position']?>" name="position" id="position" value=""></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="update" value="Update"></td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>