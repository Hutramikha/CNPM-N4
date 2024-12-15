<?php
session_start();
include './model/pdo.php';

// if (isset($_SESSION['username'])) {
//     header('index.php?act=Danhsachsanpham');
//     exit;
// }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kiểm tra dữ liệu biểu mẫu được gửi đi
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $db = new PDO('mysql:host=localhost;dbname=thuvien', 'root', '');
        $stmt = $db->prepare('SELECT * FROM taikhoan WHERE tendangnhap = :username');
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $password === $user['matkhau']) {
            extract($user);
            if ($maquyen == 2) {
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                    header('Location: index.php?act=danhSachSanPham&userId=9&currentPage=1&favo=0&searchInput=%27%27');
                    exit;
                // }

            }
        } else {
            $_SESSION['error_message'] = 'Sai tên đăng nhập hoặc mật khẩu';
            header('Location: login.php');
            exit;
        }

    } else {
        header('Location: login.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <h1> Thư viện xanh </h1>
    <?php if (isset($_SESSION['error_message'])): ?>
        <p class="error-message"><?php echo $_SESSION['error_message']; ?></p>
    <?php endif; ?>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required="true">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required="true">
        <input type="submit" value="Login">
    </form>
</body>

</html>