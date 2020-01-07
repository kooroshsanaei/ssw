<?php
    include('includes/header.php');
    if(isset($_SESSION['state_login']) && $_SESSION['state_login'] === true) {
        ?>
        <script>
            alert("کاربر گرامی شما قبلا در سایت ثبت نام کردید ,\n شما به صفحه اصلی منتقل میشوید.");
            location.replace('index.php');
        </script>
    <?php
    }
?>

    <br>

    <form name="register" action="action_register.php" method="POST">
        <table style="width:50%;" border="0" style="margin:0 auto;">

            <tr>
                <td style="width:40%;">نام واقعی <span style="color:red;">*</span></td>
                <td style="width:60%;"><input type="text" id="realname" name="realname"></td>
            </tr>

            <tr>
                <td style="width:40%">نام کاربری <span style="color:red;">*</span></td>
                <td style="width:60%"><input type="text" id="username" name="username" style="text-align:left;"></td>
            </tr>


            <tr>
                <td style="width:40%">کلمه عبور  <span style="color:red;">*</span></td>
                <td style="width:60%"><input type="password" id="password" name="password" style="text-align:left;"></td>
            </tr>

            <tr>
                <td style="width:40%; font-size:14px;">تکرار کلمه عبور <span style="color:red;">*</span></td>
                <td style="width:60%"><input type="password" id="repassword" name="repassword" style="text-align:left;"></td>
            </tr>


            <tr>
                <td style="width:40%; font-size:14px;">پست الکترونیکی <span style="color:red;">*</span></td>
                <td style="width:60%"><input type="text" id="email" name="email" style="text-align:left;"></td>
            </tr>
            
            <tr>
                <td><br><br></td>
                <td><input type="button" value="ثبت نام" onclick="check_empty()">
                &nbsp;&nbsp;&nbsp;
                <input type="reset" value="جدید"></td>
            </tr>

        </table>
    </form>


<?php
    include('includes/footer.php');
?>