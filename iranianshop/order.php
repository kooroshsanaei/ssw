<?php include('includes/header.php');?>

<?php
$link = mysqli_connect('localhost','root','','shop_db');
if(mysqli_connect_errno()) 
    exit('خطایی با شرح زیر رخ داده است'.mysqli_connect_error());

$pro_code = 0;
if(isset($_GET['id'])) 
    $pro_code = $_GET['id'];

if(!(isset($_SESSION['state_login']) && $_SESSION['state_login'] === true)) {
    ?>
    <br>
    <span style='color:red;'><b>برای خرید پستی باید وارد سایت شوید</b></span>
    <br><br>
    در صورتی که عضو فروشگاه هستید برای ورود<a href="login.php" style="text-decoration:none;"><span style="color:blue;">اینجا</span>کلیک کنید</a>
    <br>
    و در صورتی که در وبسایت عضو نیستید برای ثبت نام در سایت<a href="register.php" style="text-decoration:none;"><span style="color:blue;">اینجا</span>کلیلک کنید</a>
    <br><br>
    <?php
    exit();
}


$query = "SELECT * FROM products where pro_code = '$pro_code'";
$result = mysqli_query($link,$query);
?>

<form action="action_order.php" name='order' method="post">
<table style="width:100%;" border="1px">
<tr>
<td style="width:60%;">
<?php
if($row = mysqli_fetch_array($result)) { #ذخیره رکورد اطلاعات محصول در آرایه
    
    ?>
    <br>
    <table style='width:100%;' border="0" style="margin:0 auto;">
        <table>
            <tr>
                <td style='border-style:dotted dashed; vertical-align:center; width:33%;'>
                    <h4 style="color;brown;"><?php echo($row['pro_name']);?></h4>
                    <img src="images/products/<?php echo($row['pro_image'])?>" width="250px;" height="120px" alt="">
                    <br>
                    قیمت واحد:<?php echo($row['pro_price']);?>&nbsp;ریال
                    <br>
                    مقدار موجودی : <span style="color:Red;"><?php echo($row['pro_qty']);?></span>
                    <br>
                    توضیحات: <span style="color:green;">
                    <?php $count = strlen($row['pro_detail']);
                    echo(substr($row["pro_detail"],0,(int)($count / 4 )));
                    ?>
                    ...
                    </span> 
                    <br><br>
                </td>
            </tr>
        </table>

        <tr>
            <td style="width:22%;">کد کالا <span syle="color:red;">*</span></td>
            <td style="width:78%;"><input type="text" id="pro_code" name="pro_code" value="<?php echo($pro_code);?>"
            style="background-color:lightgray;"></td>
        </tr>
        <tr>
            <td style="width:22%;">موجودی <span syle="color:red;">*</span></td>
            <td style="width:78%;"><input type="text" id="pro_qty" name="pro_qty" value="<?php echo($row['pro_qty']);?>"
            style="background-color:lightgray;"></td>
        </tr>

        <tr>
            <td style="width:22%;">نام کالا <span syle="color:red;">*</span></td>
            <td ><input type="text" style="text-align:right;background-color;lightgray;" id="pro_name" name="pro_name"
            value="<?php echo($row['pro_name']);?>" readonly></td>
        </tr>

        <tr>
            <td>تعداد یا مقدار درخواستی <span style="color:red;">*</span></td>
            <td><input type="text" style="text-align:left;" id="pro_cqty" name="pro_cqty" onchange="calc_price();"></td>
        </tr>

        <tr>
            <td>قیمت واحد کالا <span style="color:red;">*</span></td>
            <td><input type="text" style="text-align:left;background-color:lightgray;" id="pro_price" name="pro_price" 
            value='<?php echo($row['pro_price']."0000");?>' readonly></td>
        </tr>

        <tr>
            <td>مبلغ قابل پرداخت<span style="color:red;">*</span></td>
            <td><input type="text" style="text-align:left;background-color;lightgray;" id="total_price" name="total_price"
            value="0" readonly>ریال</td>
        </tr>
        

<?php
}
$username = $_SESSION['username'];
$query1 = "SELECT * FROM users WHERE username = '$username' ";
$result1 = mysqli_query($link,$query1);
$user_row = mysqli_fetch_array($result1);
?>
    </td>
    </tr>

    <tr>
        <td><br><br><br></td>
        <td></td>
    </tr>

    <tr>
        <td style="width:40%;">نام خریدار <span style="color:Red;">*</span></td>
        <td style="width:60%;">
            <input type="text" id='realname' name='realname' value="<?php echo($user_row['realname']);?>" style='background:lightgray;' readonly>
        </td>
    </tr>
    <tr>
        <td>پست الکترونیکی<span style="color:Red;">*</span></td>
        <td >
            <input type="text" style="text-align:left;background:lightgray;" id='email' name='email' value="<?php echo($user_row['email']);?>" style='background:lightgray;' readonly>
        </td>
    </tr>

    <tr>
        <td>شماره تلفن همراه<span style="color:Red;">*</span></td>
        <td><input type="text" style="text-align:left;" id="mobile" name="mobile" value="09"></td>
    </tr>  

    <tr>
        <td>آدرس دقیق پستی جهت دریافت محصول <span style="color:red;">*</span></td>
        <td><textarea style="text-align:right;font-family:tahoma;" name="address" id="address" cols="30" rows="3" wrap="virtual"></textarea></td>

    </tr>
    <tr>
        <td><br><br><br></td>
        <td><input  style="cursor:pointer;" type="button" value="خرید محصول " onclick="check_input();" ></td>
    </tr>

   
</table>
</form>
<?php include('includes/footer.php');?>