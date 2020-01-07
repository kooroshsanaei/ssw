<?php
    include('includes/header.php');

    if(isset($_POST['realname']) && !empty($_POST['realname']) &&
        isset($_POST['username']) && !empty($_POST['username']) &&
        isset($_POST['password']) && !empty($_POST['password']) &&
        isset($_POST['repassword'])&& !empty($_POST['repassword']) &&
        isset($_POST['email']) && !empty($_POST['email']))
        {
            $realname = $_POST['realname'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $repassword = $_POST['repassword'];
            $email = $_POST['email'];
        }else {
            ?>
            <button style="cursor:pointer;"><a href="register.php">تلاش مجدد</a></button>
            <?php
            exit('برخی فیلد ها مقدار دهی نشده اند');
        }

    if($password != $repassword) {
        ?>
        <button style="cursor:pointer;"><a href="register.php">تلاش مجدد</a></button>
        <?php
        exit('کلمه عبور با تکرار ان مشابه نیست');
    }

    if(strlen($password) < 8) {
        ?>
        <button style="cursor:pointer;"><a href="register.php">تلاش مجدد</a></button>
        <?php
        exit('کلمه عبور باید بیشتر از ۸ رقم باشد');
    }

    if(filter_var($email,FILTER_VALIDATE_EMAIL) === false) {
        ?>
        <button style="cursor:pointer;"><a href="register.php">تلاش مجدد</a></button>
        <?php
        exit('ایمیل معتبر وارد کنید');
    }

    $link = mysqli_connect("localhost","root","","shop_db");

    if(mysqli_connect_errno())
        exit("خطا با شرح زیر است :".mysqli_connect_error());


    $query = "INSERT INTO shop_db.users(realname,username,password,email,type) VALUES(
        '$realname','$username','$password','$email','0')";


    if(mysqli_query($link,$query) === true ) {
        echo ("<p style='color:green;'><b>".$realname.
        "گرامی عضویت شما با نام کاربری ".$username.
        "در فروشگاه با موفقیت انجام شد"."</b></p>");
        
    } else {
        echo("<p style='color:red;'><b>عضویت شما در فروشگاه انجام نشدد </b></P>");
    }

    mysqli_close($link);

?>

<div dir="ltr" style = "text-align:left;">

<?php


?>

</div>



<?php
    include('includes/footer.php');
?>