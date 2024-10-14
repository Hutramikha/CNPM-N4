<?php
if (isset($_COOKIE['user']) && isset($_COOKIE['pass'])) {
    $usernameluu = $_COOKIE['user'];
    $passwordluu = $_COOKIE['pass'];
} else {
    $usernameluu = "";
    $passwordluu = "";
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <link rel="stylesheet" href="./signlog.css">
</head>
<body>
    

                    <?php
                     if (!isset($_SESSION['mySession'])) {
                        echo '
                        <button class="nguoidung" id="btn_form_dn">nhan</button>
                       ';
                    }
                    ?>




<div class="user__signup__login">

<div class="form_cover">

    <div id="div_overlay"></div>
    
    <div class="wrapper">
        <span id="icon-close">
            <ion-icon name="close"></ion-icon>
        </span>

        <div class="form-box form-box_login">
            <h2>Đăng nhập</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" name="form_dn" id="loginForm">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" name="username_dn" id="input_username_login" value="<?php echo $usernameluu; ?>">
                    <label id="label_username_login">Tên đăng nhập:</label>
                    <label style="font-size: 0.8em ;top: 120%;color: red ; position: absolute;" class = "error_username_login">* Vui lòng điền thông tin</label>
                </div>
                <div class="input-box">
                    <span class="icon" id="show-pass-login" style="cursor: pointer;"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password_dn" id="input_password_login" value="<?php echo $passwordluu; ?>">
                    <label id="label_password_login">Mật khẩu:</label>
                    <label style="font-size: 0.8em ;top: 120%;color: red ; position: absolute;" class = "error_password_login">* Vui lòng điền thông tin</label>
                </div>
                <div class="error_login">* Tên đăng nhập hoặc mật khẩu không chính xác</div>
                <div id="remember-forget">
                    <label><input type="checkbox" name="remember" id="remember-checkbox">Ghi nhớ đăng nhập</label>
                    <a href="#">Quên mật khẩu ?</a>
                </div>
                <button type="submit" class="btn btn_login" name="dangnhap">Đăng nhập</button>
                <div class="login_To_register">
                    <p>Bạn chưa có tài khoản ? <a href="#" id="register-link">Đăng ký</a></p>
                </div>
            </form>
        </div>

        <div class="form-box form-box_register">
            <h2>Đăng ký</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" name="form_dk" id="regisForm">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" name="username_dk" id="input_username_regis">
                    <label id="label_username_regis">Tên đăng nhập:</label>
                    <label style="font-size: 0.8em ;top: 120%;color: red ; position: absolute;" class = "error_username_regis">* Vui lòng điền thông tin</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="text" name="email" id="input_email_regis">
                    <label id="label_email_regis">Email:</label>
                    <label style="font-size: 0.8em ;top: 120%;color: red ; position: absolute;" class = "error_email_regis">* Vui lòng điền thông tin</label>
                </div>
                <div class="input-box">
                    <span class="icon" id="show-pass-regis" style="cursor: pointer;"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password_dk" id="input_password_regis">
                    <label id="label_password_regis">Mật khẩu:</label>
                    <label style="font-size: 0.8em ;top: 120%;color: red ; position: absolute;" class = "error_password_regis">* Vui lòng điền thông tin</label>
                </div>
                <div class="input-box">
                    <span class="icon" id="show-repass-regis" style="cursor: pointer;"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="repassword_dk" id="input_repassword_regis">
                    <label id="label_repassword_regis">Xác nhận mật khẩu:</label>
                    <label style="font-size: 0.8em ;top: 120%;color: red ; position: absolute;" class = "error_repasssword_regis">* Vui lòng điền thông tin</label>
                </div>
                <div id="agree-with">
                    <label><input type="checkbox" id="checkbox_regis">Tôi đồng ý với các <a href="#">điều khoản</a>và<a href="#">dịch vụ</a></label>
                </div>
                <div class="error_regis">* Vui lòng đồng ý với các điều khoản và dịch vụ</div>
                <button type="submit" class="btn btn_regis" name="dangky">Đăng ký</button>
                <div class="register_To_login">
                    <p>Tôi đã có tài khoản <a href="#" id="login-link">Đăng nhập</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
</div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>


<script src="./signlog.js"></script>


</body>
</html>