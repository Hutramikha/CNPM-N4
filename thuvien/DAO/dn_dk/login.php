<?php
require '../database/connect.php';

session_start();
$_SESSION['mySession']=[];


if (isset($_POST['username_dn']) && isset($_POST['password_dn'])) {
    $username = $_POST['username_dn'];
    $password = $_POST['password_dn'];
    $usernameluu = $_POST['username_luu'];
    $passwordluu = $_POST['password_luu'];

    $sql = "SELECT * FROM taikhoan WHERE tendangnhap='$username' AND matkhau='$password'";
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['mySession'][0] = $username;
        $_SESSION['mySession'][1] = $password;
        setcookie("username",$username,time()+(86400*1),'/');
        $response = array('status' => 'success');
        echo json_encode($response);

        if ($usernameluu!=="" && $passwordluu!=="") {
            setcookie("user",$usernameluu,time()+(86400*7),'/');
            setcookie("pass",$passwordluu,time()+(86400*7),'/');
        } 
    } else {
        $response = array('status' => 'fail');
        echo json_encode($response);
    }
} else {
    $response = array('status' => 'fail');
    echo json_encode($response);
}

mysqli_close($connect);

?>
