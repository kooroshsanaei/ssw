<?php include('includes/header.php');
    if(isset($_SESSION['state_login']) && $_SESSION['state_login'] === true && $_SESSION['user_type'] == 'public') {
        ?>
        <script>
            location.replace('index.php');
        </script>
    <?php
    }

?>
<br>
<form name="add_product" action="action_admin_products.php" method="POST" enctype="multipart/form-data">

    <table style="width:100%;" border="0" style="margin:0 auto;">

    <tr>
        <td style="width:22%;">کد کالا <span style="color:red;">*</span></td>
        <td style="width:78%;"><input type="text" id="pro_code" name="pro_code"></td>
    </tr>

    <tr>
        <td style="width:22%;">نام کالا<span style="color:red;">*</span></td>
        <td style="width:78%;"><input style="text-align:right;" type="text" id="pro_name" name="pro_name"></td>
    </tr>

    <tr>
        <td style="width:22%;"> موجودی کالا<span style="color:red;">*</span></td>
        <td style="width:78%;"><input style="text-align:left;" type="text" id="pro_qty" name="pro_qty"></td>
    </tr>

    <tr>
        <td style="width:22%;">قیمت کالا<span style="color:red;">*</span></td>
        <td style="width:78%;"><input style="text-align:left;" type="text" id="pro_price" name="pro_price">ریال</td>
    </tr>

    <tr>
        <td style="width:22%;">آپلود تصویر کالا<span style="color:red;">*</span></td>
        <td style="width:78%;"><input style="text-align:left;" type="file" id="pro_image" name="pro_image" size="30"></td>
    </tr>

    <tr>
        <td style="width:22%;">توضیحات تکمیلی<span style="color:red;">*</span></td>
        <td style="width:78%;"><textarea name="pro_detail" id="pro_detail" cols="30" rows="15" wrap="virtual"></textarea></td>
    </tr>

    <tr><br><br></tr>
    <td><input type="submit" value="افزودن کالا"><br><br><input type="reset" value="جدید"></td>
    </table>
    
</form>

<?php include('includes/footer.php');?>